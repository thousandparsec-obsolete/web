#! /bin/sh

CVSROOT="/var/www/thousandparsec/cvs/"

cd $CVSROOT
cvs update -dP

cd $CVSROOT/web/dev/documents/python/

epydoc --html -o netlib-doc -v --private-css green --docformat plaintext netlib
tar -zcvf py-netlib-doc-cvs.tar.gz netlib-doc/*

#create libtpproto-cpp docs.
cd $CVSROOT/libtpproto-cpp/
doxygen Doxfile
mv docs libtpproto-cpp-doc
tar czf libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp-doc
mv libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp-doc/html/


# Run the sloc2html update
cd $CVSROOT/web/utils

exec ./sloc2html.sh



