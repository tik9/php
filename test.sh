server_local=localhost
server_network=192.168.178.23
port=3000

function fetch_node {
    curl -s server_network:$port/showdir/gpx
}

function fetch_local {
    curl -s $server_local:$port/web/server.php
}

function test_list {
    curl -s $server_local:$port/web
}

function test_create {
    curl -s $server_local:$port/web/update.php?newentry=true
}

function test_update {
    curl -s $server_local:$port/web/update.php?id=1
}
fetch_local

fetch_node