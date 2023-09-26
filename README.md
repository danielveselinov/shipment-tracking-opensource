## This repository for {{ Company }} shipment tracking.

To run this project locally you need to clone this repo first.
Then you need to run following commands:

- `composer install`
- `cp .env.example .env`
- `artisan key:generate`

Then you need to setup the DB and SMTP credentials, so after you can run.

    artisan migrate --seed

One last step is to install the npm and compile assets.

    npm install

development: `npm run dev`

production: `npm build`

## Deployment settings


