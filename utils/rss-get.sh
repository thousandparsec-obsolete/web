#! /bin/sh

if [ "x$WEBROOT" = "x" ]; then
	WEBROOT="/srv/www.thousandparsec/tp"
fi

cd $WEBROOT
TMP=$WEBROOT/tmp

# Download the latest metaserver stats
wget "http://metaserver.thousandparsec.net/?action=badge" -O $TMP/meta.inc

# Download the sourceforge rss details (for bugs, etc)
wget "http://sourceforge.net/export/rss2_projsummary.php?group_id=132078&go" -O $TMP/sf.rss
# Post process the rss details
echo "<?php " > $TMP/sf-stats.inc
cat $TMP/sf.rss | grep "Ranking:" | sed -e's/.*: Ranking: \(.*\), Activity.*/$sf_ranking="\1";/' >> $TMP/sf-stats.inc
cat $TMP/sf.rss | grep "Tracker: Bugs" | sed -e's/.*: Bugs (\(.*\) open\/\(.*\) total).*/$sf_bugs_open="\1"; $sf_bugs_closed="\2";/' >> $TMP/sf-stats.inc
cat $TMP/sf.rss | grep "Tracker: Todo" | sed -e's/.*: Todo (\(.*\) open\/\(.*\) total).*/$sf_todo_open="\1"; $sf_todo_closed="\2";/' >> $TMP/sf-stats.inc
cat $TMP/sf.rss | grep "Developers on project: " | sed -e's/.*Developers on project: \(.*\)<.*/$sf_devs="\1";/' >> $TMP/sf-stats.inc

wget "http://sourceforge.net/project/stats/graph/detail-graph.php?group_id=132078&ugn=thousandparsec&type=sfweb&mode=week&graph=2" -O $TMP/sf-stats.png
convert -resize 50x27 $TMP/sf-stats.png $TMP/sf-stats-small.png

# Download the tracker information
ruby $WEBROOT/utils/sftodo.rb > $TMP/sf-todo.inc

# Download the freshmeat rss details
find $TMP/fm.rss -mtime +1 -exec rm '{}' ';'
if [ ! -e $TMP/fm.rss ]; then
	# Download the freshmeat rss details
	wget "http://freshmeat.net/projects-xml/tp/tp.xml" -O $TMP/fm.rss
	echo "<?php " > $TMP/fm-stats.inc
	cat $TMP/fm.rss | egrep -e 'vitality|popularity|rating|subscriptions|url_project_page' | sed -e's|<\(.*\)>\(.*\)</.*>|$fm_\1 = "\2";|' >> $TMP/fm-stats.inc

	# Download the freshmeat graphics
	wget --user-agent="Mozilla/5.0 lookalike" "http://freshmeat.net/project-stats/import-download-stats-small/43366/" -O $TMP/fm-stats.png
	convert -crop 30x50+70+0 $TMP/fm-stats.png $TMP/fm-stats-small.png
fi

# Download the mailing list details
export lists="
 tp.announce
 tp.devel
 tp.general"

if [ ! -d $TMP/lists ]; then
	mkdir $TMP/lists
fi
for list in $lists; do
	# Download the last message details
	wget "http://rss.gmane.org/messages/excerpts/gmane.comp.games.$list" -O $TMP/lists/$list.rss

	# Download the post graphics
	wget "http://gmane.org/plot-rate.php?group=gmane.comp.games.$list" -O $TMP/lists/$list.png
	convert -resize 50x15 $TMP/lists/$list.png $TMP/lists/$list-small.png
done
# Post process the repository rss (combind them, sort them and trim old)
ruby $WEBROOT/utils/rss2php.rb lists $TMP/lists/*.rss > $TMP/lists.inc

# Download the rss details from the git repository
export repositories="
 libtpclient-py.git
 libtpproto-cpp.git
 libtpproto-php.git
 libtpproto-py.git
 libtpproto-rb.git
 libtpproto2-py.git
 tpclient-cpptext.git
 tpclient-pyogre.git
 tpclient-pytext.git
 tpclient-pywx.git
 tpsai-py.git
 tpserver-cpp.git
 tpserver-py.git"

if [ ! -d $TMP/git ]; then
	mkdir $TMP/git
fi
for repository in $repositories; do
	wget "http://git.thousandparsec.net/gitweb/gitweb.cgi?p=$repository;a=rss" -O $TMP/git/$repository.rss
done
# Post process the repository rss (combind them, sort them and trim old)
ruby $WEBROOT/utils/rss2php.rb git $TMP/git/*.rss > $TMP/git.inc

# Cache Google Code stats
cd $WEBROOT/utils
php -f $WEBROOT/utils/cache_google_data.php
