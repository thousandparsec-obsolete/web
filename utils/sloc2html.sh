#! /bin/sh

CVSROOT=/var/www/www.thousandparsec.net/cvs/
TMPDIR=/tmp/sloc2html

INPUT=/tmp/sloc.output
OUTPUT=/var/www/www.thousandparsec.net/tp/dev/bits/sloc.inc

mkdir $TMPDIR
sloccount --wide --multiproject --datadir $TMPDIR $CVSROOT > $INPUT 2> /dev/null
python ./sloc2html.py $INPUT > $OUTPUT
rm -rf $TMPDIR
