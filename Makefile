infection:
	XDEBUG_MODE=coverage ./infection.phar --threads=4 --show-mutations

test:
	php artisan test
