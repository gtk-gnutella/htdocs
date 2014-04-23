#!/bin/sh
if [ "x$1" = "x" ]
then
	echo "Usage: update_homepage.sh sourceforgeusername"
	exit	
fi

git archive --format=tar HEAD | tar -t  | \
	rsync --verbose --files-from=- -lv --delete \
	--chmod=Dug+x,g-w,Fg-w,o-w . \
	$1,gtk-gnutella@web.sourceforge.net:/home/project-web/gtk-gnutella/htdocs

