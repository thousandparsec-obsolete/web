#! /bin/sh

CVSROOT="/var/www/thousandparsec/cvs/"

cd $CVSROOT
cvs update -dP

#create py-netlib docs.
cd $CVSROOT/web/dev/documents/python/
epydoc --html -o libtpproto-py-doc -v --private-css green --docformat plaintext netlib
tar -zcvf libtpproto-py-doc-cvs.tar.gz libtpproto-py-doc/*

#create libtpproto-cpp docs.
cd $CVSROOT/libtpproto-cpp/
doxygen Doxyfile
rm -fr libtpproto-cpp-doc
mv docs libtpproto-cpp-doc
tar czf libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp-doc
mv libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp-doc/html/

# Run the sloc2html update
cd $CVSROOT/web/utils
exec ./sloc2html.sh

