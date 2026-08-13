DOCKER := docker

REGISTRY := faww

IMAGE = $(file < TAG)
VERSION = $(file < VERSION)
TAG = $(REGISTRY)/$(IMAGE):$(VERSION)

all: build

full-test: test build

test:
	$(DOCKER) run -it --entrypoint /bin/bash $(TAG)

build:
	$(DOCKER) buildx build \
		--platform linux/amd64,linux/arm64 \
		--push \
		--tag $(TAG) 
		--tag $(REGISTRY)/$(IMAGE):latest .
