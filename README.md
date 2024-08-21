
<a id="readme-top"></a>



<!-- PROJECT LOGO -->
<br />

  <h1 align="center">Notification System</h1>


</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project


This Laravel project implements a notification system that supports real-time notifications using both email and asynchronous notifications via a queue system. Users can subscribe to various notification types, and the system processes and sends notifications based on their preferences. The entire application is containerized using Docker.



### Built With


* [![Laravel](https://img.shields.io/badge/Laravel-red)](https://www.laravel.com/)
* [![Dockerized](https://img.shields.io/badge/Docker-blue)](https://www.docker.com/)
* [![Pusher](https://img.shields.io/badge/Pusher-purple)](https://www.pusher.com/)
* [![Pusher](https://img.shields.io/badge/Vite-yellow)](https://www.vitejs.dev/)

* [![LaravelEcho](https://img.shields.io/badge/LaravelEcho-skyblue)](https://laravel.com/docs/11.x/broadcasting)


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started


### Prerequisites

You will need to have docker engine installed, Please refer [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/) for instructions 


### Installation



1. Clone the repo
   ```sh
   git clone https://github.com/elyessayadi/notification-system.git
   ```

2. Set up your pusher and SMTP creds in .env file
3. Build and Run Docker Containers
   ```sh
   docker-compose up --build
   ```
Docker services summary: 

* app: Runs the Laravel app, handles migrations, and starts Supervisor.

* nginx: Serves the Laravel app using Nginx.

* db: MySQL database for the app.

* queue: Processes background jobs using the database queue.

* laravel: Network for connecting containers.

* db_data: Persistent volume for database data.

<!-- USAGE EXAMPLES -->
## Usage

1. Open `http://localhost:8000` where laravel echo subscribes to notifications channel.
2. Trigger notifications event through `http://localhost:8000/test-notification`.
3. Verify that emails are sent (mailtrap is a free tool for simulating smtp) and real-time notifications appear in `http://localhost:8000`.


<p align="right">(<a href="#readme-top">back to top</a>)</p>










<!-- CONTACT -->
## Contact

Elyes Sayadi - https://www.linkedin.com/in/sayadi-elyes-1799b4201/ - elyessayadi007@gmail.com

Project Link: [https://github.com/elyessayadi/notification-system](https://github.com/elyessayadi/notification-system)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



