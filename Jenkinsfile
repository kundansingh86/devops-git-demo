pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                bat "docker build -t kundands/myfirstpipeline D:\\JENKINS-SLAVES\\SLAVE-1\\workspace\\MyFirstPipline"
            }
        }
        stage('Test') {
            steps {
                echo 'Testing..'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
            }
        }
    }
    post { 
        always { 
            cleanWs()
        }
    }
}