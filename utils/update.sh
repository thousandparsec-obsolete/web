#! /bin/sh

if [ "x$GITROOT" = "x" ]; then
	GITROOT="/srv/www.thousandparsec/repos"
fi

cd $GITROOT
for r in `ls`; do
  if test -x $GITROOT/$r/.git ; then
    cd $GITROOT/$r
    git-pull
  fi
done

#create the stable version of tp.* documents.
cd $GITROOT/web/dev/documents/python/netlib
epydoc --html -o libtpproto-py-doc -v --private-css green --docformat plaintext tp
tar -zcvf libtpproto-py-doc.tar.gz python-tp-doc/*
cd $GITROOT/web/dev/documents/python/stable
epydoc --html -o python-tp-doc -v --private-css green --docformat plaintext tp
tar -zcvf python-tp-doc.tar.gz python-tp-doc/*
cd $GITROOT/web/dev/documents/python/dev
epydoc --html -o python-tp-doc -v --private-css green --docformat plaintext tp
tar -zcvf python-tp-doc.tar.gz python-tp-doc/*

#create libtpproto-cpp docs.
cd $GITROOT/libtpproto-cpp/
doxygen Doxyfile
cd ..
tar czf libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp/docs/
rm -fr $GITROOT/web/dev/documents/libtpproto-cpp/*
mv libtpproto-cpp-doc-cvs.tar.gz libtpproto-cpp/docs/* $GITROOT/web/dev/documents/libtpproto-cpp/

# Create any new thumbnails
cd $GITROOT/web/screenshots
./makethumbs.sh

#generate content of protocolxml.php from darcs
cd $GITROOT/documents
xsltproc $GITROOT/web/dev/documents/protocol2html.xsl ./protocol/protocol.xml > $GITROOT/web/dev/bits/protocolxml.inc

# Run the sloc2html update
cd $GITROOT/web/utils
exec ./sloc2html.sh

