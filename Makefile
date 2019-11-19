NAME=`grep "^export MY_NAME" *.sh|cut -d"\"" -f2`
VERSION=`grep "^export MY_VERSION" *.sh|cut -d"\"" -f2`
DATE=`date`
HOST=`cat ssh`

test:
	echo $(NAME)
	echo $(VERSION)

version_file:
	echo 'LAST_VERSION="'$(VERSION)'"\nLAST_VERSION_PUBLISHED="'$(DATE)'"\nLAST_VERSION_LINK="https://api.ivli.se/firmware/'$(NAME)'-'$(VERSION)'.zip"' > version.txt

zip:
	rm Deploy.zip; \
	zip -qr Deploy.zip ../$(NAME) \
			-x \*.git* \
			-x \*Makefile

upload:
	scp Deploy.zip $(HOST)/$(NAME)-$(VERSION).zip
	scp version.txt $(HOST)/version.txt

deploy: zip version_file upload
