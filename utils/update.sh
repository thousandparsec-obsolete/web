#! /bin/sh

CVSROOT="/var/www/www.thousandparsec.net/cvs/"

cd $CVSROOT
cvs update -dP

# Run the sloc2html update
cd $CVSROOT/web/utils

exec ./sloc2html.sh
