# ms-observability-study

This project is a study project to understand how to build a microservice with observability in mind.

---

## How to run the project

### Up
```bash
docker-compose up -d
```

### Down
```bash
docker-compose down
```

### Logs
Use the following command to see the logs of a container:
- Replace `{container_name}` with the name of the container you want to see the logs, example: `app`, `mysql`, `redis`, etc.
```bash
docker-compose logs -f {container_name}
```

### Access the container
Use the following command to access the container:
- Replace `{container_name}` with the name of the container you want to access, example: `app`, `mysql`, `redis`, etc.
```bash
docker-compose exec -it {container_name} bash
```

### Run Hyperf commands
Use the following command to run a hyperf command:
- Replace `{command}` with the command you want to run, example: `list`, `route:list`, `migrate`, etc.
```bash
docker-compose exec app php ./bin/hyperf.php {command}
```

---

## Todos:

### Step 1 (Start the project)
- [x] Add a description of the project

### Step 2 (Add the basic infrastructure)
- [X] Add a dockerfile and docker-compose file
- [X] Add PHP
- [X] Add Composer
- [X] Add Swoole
- [X] Add XDebug
- [X] Add a `docker-compose up` command to the README.md

### Step 3 (Build the hyperf project)
- [X] Build the hyperf project
- [X] Add functional basic endpoint
  - [X] GET /posts - Returns a list of posts
  - [X] GET /posts/{id} - Returns a post by id
  - [X] POST /posts - Creates a new post

### Step 4 (Persistence)
- [X] Add MySQL into the project
  - [X] Add hyperf deps. to use mysql
    - [X] Add persistence to the posts Store
    - [X] Add persistence to the posts List
    - [X] Add persistence to the posts Show
- [X] Add Redis into the project
  - [X] Add cache to the posts List
  - [X] Add cache to the posts Show
  - [X] Add cache clear to the posts Store

### Step 5 (Observability - Dashboards)
- [X] Add Grafana to the project
  - Study content
    - [grafana-fundamentals](https://grafana.com/tutorials/grafana-fundamentals/?pg=tutorials&plcmt=results)
    - [grafana-for-beginners](https://www.youtube.com/watch?v=TQur9GJHIIQ&list=PLDGkOdUX1Ujo27m6qiTPPCpFHVfyKq9jT&ab_channel=Grafana)

### Step 6 (Observability - Logs)
- [ ] Add Grafana Loki
- [ ] Integrate into Grafana Dashboards

### Step 7 (Observability - Metrics)
- [ ] Add Prometheus
- [ ] Integrate into Grafana Dashboards

### Step 8 (Observability - Tracing)
- [ ] Add Jaeger (or Zipkin? or other?)
- [ ] Integrate into Grafana Dashboards

### Step x (x)
- [ ] Add KONG (api-gateway)
