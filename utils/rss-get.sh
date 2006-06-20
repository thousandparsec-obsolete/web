#! /bin/sh

TMP=../tmp

# Download the sourceforge rss details (for bugs, etc)
wget "http://sourceforge.net/export/rss2_projsummary.php?group_id=132078&go" -O $TMP/sf.rss
# Post process the rss details
more $TMP/sf.rss | grep "Tracker: Bugs" | sed -e's/.*: Bugs (\(.*\) open\/\(.*\) total).*/<?php $bugs_open="\1"; $bugs_closed="\2";/' > $TMP/sf-bugs.inc
more $TMP/sf.rss | grep "Tracker: Todo" | sed -e's/.*: Todo (\(.*\) open\/\(.*\) total).*/<?php $todo_open="\1"; $todo_closed="\2";/' > $TMP/sf-todo.inc


# Download the rss details from the darcs repository
export repositories="
 libtpclient-py
 libtpproto-cpp
 libtpproto-php
 libtpproto-py
 libtpproto-rb
 libtpproto2-py
 media
 tpclient-cpptext
 tpclient-java
 tpclient-pygame
 tpclient-pyogre
 tpclient-pytext
 tpclient-pywx
 tpsai-py
 tpserver-cpp
 tpserver-py"

if [ ! -d $TMP/darcs ]; then
	mkdir $TMP/darcs
fi
for repository in $repositories; do
	wget "http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=$repository;a=rss" -O $TMP/darcs/$repository.rss
done

# Post process the repository rss (combind them, sort them and trim old)


# Download the mailing list details


