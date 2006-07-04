require 'open-uri'
require 'rexml/document'
require 'date'

prefix = ARGV.shift

TRANSLATIONS = {
  :when => ['dc:date', 'pubDate'],
  :whom => ['dc:creator', 'author'],
  :title => ['title', 'description'],
}

items = []
ARGV.each do |file|
  open(file) do |f|
    content = f.read
    doc = REXML::Document.new(content)
    doc.get_elements('//item').each do |el|
      item = { :where => file }
      TRANSLATIONS.each do |var, nodes|
        item[var] = nodes.inject(nil) {|l,r| l || el.elements[r]}.get_text.to_s
      end
      items << item
    end
  end
end

items = items.sort_by {|item| DateTime.parse(item[:when]) }.reverse

items.each {|item| item[:title].gsub!(/^[0-9][0-9] [A-Z][a-z][a-z] [0-9][0-9]:[0-9][0-9] - /, '') }
items.each {|item| item[:when] = DateTime.parse(item[:when]).to_s }

# We only want the top 15 items
items = items[0,5]

def php_string(value)
  "'" + value.to_s.gsub(/'/, "\\'") + "'"
end

puts "<?php\n$#{prefix} = array("
array = []
items.each do |item|
  x = []
  item.each {|key,value| x << (php_string(key) + ' => ' + php_string(value)) }
  array << "\tarray(#{x.join(', ')})"
end
puts array.join( ", \n" )
puts ");"

