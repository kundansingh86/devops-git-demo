pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                bat "docker build -t kundands/myfirstpipeline D:\JENKINS-SLAVES\SLAVE-1\workspace\My-Project-Test"
            }
        }
        stage('Clean') {
            steps {
                bat "docker rm -f mypipelineweb || true"
            }
        }
        stage('Deploy') {
            steps {
                bat "docker run -it -d -p 96:80 --name mypipelineweb kundands/myfirstpipeline"
            }
        }
    }
    post { 
        always { 
            cleanWs()
        }
    }
}