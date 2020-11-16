# Requirements
- Install Docker

# Usage
Run docker compose and build `docker-compose up --build -d` (only needed 1st time)
Next time you can just run `docker-compose up -d`

Docker compose will run 2 containers: `app` container and `db` container

open this http://localhost:8000/api/getCoordinate.php?name=monas on your browser
open this http://localhost:8000/api/getLocation.php?latitude=-6.175307&longitude=106.82734 on your browser

### API

#### GET http://localhost:8000/api/getCoordinate.php?name=monas
```
{
    "latitude":"-6.175307",
    "longitude":"106.82734",
    "name":"monas"
}
```

#### GET http://localhost:8000/api/getLocation.php?latitude=-6.175307&longitude=106.82734
```
response:
{
    "name":"monas",
    "colour":"green"
}
```