server_local=localhost
server_network=192.168.178.45
port=3000
port=80

function fetch_node {
    curl -s $server_network:$port/dir/gpx
}

function fetch_local {
    curl -s $server_local:$port/public/server2.php
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

# fetch_node
test_list