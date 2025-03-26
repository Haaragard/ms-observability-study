# ms-observability-study

This project is a study project to understand how to build a microservice with observability in mind.

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
- [ ] Add a `docker-compose up` command to the README.md

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
    - [ ] Add persistence to the posts Show
- [ ] Add Redis into the project
  - [ ] Add cache to the posts List
  - [ ] Add cache to the posts Show

### Step 5 (Observability - Dashboards)
- [ ] Add Grafana Dashboards

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
