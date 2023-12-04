# Sets up the AWS provider with specified region and user profile for infrastructure management.
provider "aws" {
    region  = var.aws_region
    profile = var.aws_profile
}

# Generates a TLS private key using RSA encryption with a 4096-bit  length.
resource "tls_private_key" "tls_private_key" {
    algorithm = "RSA"
    rsa_bits  = 4096
}

# Creates an AWS key pair named "mare", linking it to the public key from the TLS private key.
resource "aws_key_pair" "generated_key" {
    key_name   = "mare1234"
    public_key = tls_private_key.tls_private_key.public_key_openssh
}
