install:
	composer install
brain-games:
	./bin/brain-games
brain-even:
	./src/brain-even
brain-calc:
	./src/brain-calc
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
