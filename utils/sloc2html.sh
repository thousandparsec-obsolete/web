#! /bin/sh

REPOROOT=/srv/www.thousandparsec/repos/
TMPDIR=/tmp/sloc2html

INPUT=/tmp/sloc.output
OUTPUT=/srv/www.thousandparsec/tp/dev/bits/sloc.inc

mkdir $TMPDIR
sloccount --wide --multiproject --datadir $TMPDIR $REPOROOT > $INPUT 2> /dev/null
python ./sloc2html.py $INPUT > $OUTPUT
rm -rf $TMPDIR
