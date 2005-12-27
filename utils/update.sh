#! /bin/sh

DARCSROOT="/var/www/thousandparsec/repos/"

#create py-netlib docs.
cd $DARCSROOT/web/dev/documents/python/
epydoc --html -o libtpproto-py-doc -v --private-css green --docformat plaintext netlib
tar -zcvf libtpproto-py-doc-cvs.tar.gz libtpproto-py-doc/*

#create libtpproto-cpp docs.
cd $DARCSROOT/libtpproto-cpp/
doxygen Doxyfile
cd ..
tar czf libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp/docs/
mv libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp/docs/* $DARCSROOT/web/dev/documents/libtpproto-cpp/

# Create any new thumbnails
cd $DARCSROOT/web/screenshots
./makethumbs.sh

# Run the sloc2html update
cd $DARCSROOT/web/utils
exec ./sloc2html.sh

