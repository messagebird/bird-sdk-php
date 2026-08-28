# Bird PHP SDK — local dev targets. Mirrors clients/sdk-python/Makefile.
.PHONY: install generate test lint analyse fmt build

install:  ## install dependencies (creates vendor/ + composer.lock)
	composer install

# Not a composer script any more: generation left the PHP toolchain.
generate:  ## regenerate src/Wire from the OpenAPI public bundle (in-process Go)
	../../tools/bin/beak run clients:sdk-php-generate

test:
	composer test

lint:  ## php-cs-fixer dry-run (PSR-12)
	composer lint

analyse:  ## phpstan
	composer analyse

fmt:  ## apply php-cs-fixer
	composer exec php-cs-fixer fix

build:  ## validate the package manifest
	composer validate --strict
