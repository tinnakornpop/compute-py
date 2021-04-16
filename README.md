# compute-py
## Docker image を作れました。（笑）

### example
```
cd ~/gitpc/computer-py; cp server/env/.env.local server/.env; docker-compose up --build -d; docker-compose exec php bash
```

### test
```
cd ~/gitpc/computer-py; docker-compose build --no-cache; docker-compose up -d; docker-compose exec app bash
```

### Use this
```
cd ~/gitpc/computer-py; docker-compose up --build -d; docker-compose exec app bash
```