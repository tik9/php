server_local=localhost
server_network=192.168.178.45
port=4000
port=3000

function fetch_node {
    curl -s $server_network:$port/dir/gpx
}

function fetch_local {
    serport=$server_local:$port
    # printf $serport
    curl -s $serport/public/server.php
}

function test_list {
    curl -s $server_local:$port/public
}

function test_create {
    curl -s $server_local:$port/public/update.php?newentry=true
}

function test_update {
    curl -s $server_local:$port/public/update.php?id=1
}

# fetch_local

fetch_node