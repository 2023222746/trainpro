echo "# TrainPro - Class & Enrolment Management System

## Tech Stack
- Laravel 11
- MySQL 8
- Docker & Docker Compose
- Laravel Breeze (Authentication)
- Fiuu Payment Gateway

## Quick Start (Docker)
1. Clone the repo: \`git clone https://github.com/your-username/trainpro.git\`
2. Copy \`.env.example\` to \`.env\` and set \`DB_HOST=db\`
3. Run \`docker-compose up -d --build\`
4. Run \`docker-compose exec app php artisan key:generate\`
5. Run \`docker-compose exec app php artisan migrate --seed\`
6. Visit \`http://localhost:8080\`
" > README.md

# Add and commit the README
git add README.md
git commit -m "Add README with setup instructions"
git push
