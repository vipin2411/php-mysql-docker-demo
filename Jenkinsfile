pipeline {
    agent any

    environment {
        COMPOSE_CMD = 'docker compose'
    }

    stages {
        stage('Clone Code') {
            steps {
                git 'https://github.com/vipin2411/php-mysql-docker-demo.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "${COMPOSE_CMD} build"
            }
        }

        stage('Deploy with Docker Compose') {
            steps {
                sh "${COMPOSE_CMD} down || true"
                sh "${COMPOSE_CMD} up -d"
            }
        }

        stage('Verify App') {
            steps {
                script {
                    sleep 10 // wait for services to be ready
                    def response = sh(script: "curl -s http://localhost:8000", returnStdout: true).trim()
                    if (!response.contains("Connected successfully")) {
                        error("App did not deploy properly!")
                    } else {
                        echo "App is up and running!"
                    }
                }
            }
        }
    }

    post {
        failure {
            echo "Something went wrong. Check logs!"
        }

        success {
            echo "Deployment successful!"
        }
    }
}
