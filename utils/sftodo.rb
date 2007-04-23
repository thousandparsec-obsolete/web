
require 'open-uri'

prefix = ARGV.shift || 'todo'
tracker_url = ARGV.shift || 'http://sourceforge.net/tracker/?group_id=132078&atid=829724'

rows, buffer = [], ''
open(tracker_url, 'r') do |file|
  file.each do |line|
    if (line =~ %r(<table width="100%" border="0" cellspacing="2" cellpadding="3">))..(line =~ %r(</table>))
      if line =~ %r(\s+</tr>)
        rows << buffer
        buffer = ''
      else
        buffer << line
      end
    end
  end
end

def php_string(value)
  "'" + value.to_s.gsub(/'/, "\\'") + "'"
end

puts "<?php $#{prefix} = array("
array_rows = rows.map do |row|
  url, summary, owner = '', '', ''
  if row =~ %r{^\s*<a href="([^"]*)">\s*(.*)\s*</a>}
    url, summary = $1, $2
  end
  if row =~ %r{<td>(.*)</td>}
    owner = $1
    if owner =~ %r{<a href="/users/[^"]*">([^<]*)</a>.*} then owner = $1 end
  end
  "array('url' => #{php_string url}, 'summary' => #{php_string summary}, 'owner' => #{php_string owner})"
end
puts array_rows.join(", \n")
puts ") ?>"

