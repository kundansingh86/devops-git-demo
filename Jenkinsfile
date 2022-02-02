pipeline {
    agent Slave-1

    stages {
        stage('Build') {
            steps {
                bat "docker build -t kundands/myfirstpipeline D:\\JENKINS-SLAVES\\SLAVE-1\\workspace\\MyFirstPipeline"
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