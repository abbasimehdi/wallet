
# Requirements
- docker
- ubuntu

# Run Project
- sudo docker-compose up -d
- http://your_local_ip:8000

# docker database host ip
- sudo docker inspect wallet_db_1
- copy "IPAddress": "192.168.240.4"
- - Replace it in line 1 of src/env.php file with $servername
- - Replace it in src/config/Dbconfig.php file line 11 with before host

