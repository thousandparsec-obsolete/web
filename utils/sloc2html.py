#!/usr/bin/env python
# Written by Rasmus Toftdahl Olesen <rto@pohldata.dk>
# Released under the GNU General Public License v. 2 or higher
from string import *
import sys

NAME = "sloc2html"
VERSION = "0.0.1"

import signal
# Die if we havn't finished in 30 seconds
signal.alarm(30)

if len(sys.argv) != 2:
    print "Usage:"
    print "\t" + sys.argv[0] + " <sloc output file>"
    print "\nThe output of sloccount should be with --wide and --multiproject formatting"
    sys.exit()

colors = { "python" : "blue",
           "perl" : "purple",
           "ansic" : "silver",
	   "java" : "#996600",
           "cpp" : "green",
           "sh" : "red",
	   "php" : "brown",
	   "lisp" : "#FFB23E",
           "ruby" : "#66CCCC",
	   "pascal" : "#FFCCFF",
	   }

print "<h1>Counted Source Lines of Code</h1>"

file = open ( sys.argv[1], "r" )

print "<h2>Projects</h2>"
line = ""
while line != "SLOC\tDirectory\tSLOC-by-Language (Sorted)\n":
    line = file.readline()

print "<table>"
print "<tr><th>Lines</th><th>Project</th><th>Language distribution</th></tr>"
line = ''
while line != "\n":
    line = file.readline()
    try:
        num, project, langs = split ( line )
    except:
    	print line
    	continue
    print "<tr><td>" + num + "</td><td>" + project + "</td><td>"
    print "<table width=\"500\"><tr>"
    for lang in split ( langs, "," ):
    	try:
	        l, n = split ( lang, "=" )
	except:
		print lang
		continue
        print "<td bgcolor=\"" + colors[l] + "\" width=\"" + str( float(n) / float(num) * 500 ) + "\">" + n + "&nbsp;(" + str(int(float(n) / float(num) * 100)) + "%)</td>"
    print "</tr></table>"
    print "</td></tr>"
print "</table>"

print "<h2>Languages</h2>"
while line != "Totals grouped by language (dominant language first):\n":
    line = file.readline()

print "<table>"
print "<tr><th>Language</th><th>Lines</th></tr>"
line = file.readline()
while line != "\n":
    lang, lines, per = split ( line )
    lang = lang[:-1]
    print "<tr><td bgcolor=\"" + colors[lang] + "\">" + lang + "</td><td>" + lines + " " + per + "</td></tr>"
    line = file.readline()
print "</table>"

print "<h2>Totals</h2>"
while line == "\n":
    line = file.readline()

print "<table>"
print "<tr><td>Total Physical Lines of Code (SLOC):</td><td>" + strip(split(line,"=")[1]) + "</td></tr>"
line = file.readline()
print "<tr><td>Estimated development effort:</td><td>" + strip(split(line,"=")[1]) + " person-years (person-months)</td></tr>"
line = file.readline()
line = file.readline()
print "<tr><td>Schedule estimate:</td><td>" + strip(split(line,"=")[1]) + " years (months)</td></tr>"
line = file.readline()
line = file.readline()
print "<tr><td>Total estimated cost to develop:</td><td>" + strip(split(line,"=")[1]) + "</td></tr>"
print "</table>"

file.close()
