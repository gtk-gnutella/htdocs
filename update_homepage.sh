#!/bin/sh
if [ "$1" == "" ]
then
	echo "Usage: update_homepage.sh sourceforgeusername"
	exit	
fi

git archive --format=tar HEAD | tar -t  | rsync --files-from=- -lv --delete --chmod=Dug+x,g-w,Fg-w,o-w  . $1,gtk-gnutella@web.sourceforge.net:/home/project-web/gtk-gnutella/htdocs



