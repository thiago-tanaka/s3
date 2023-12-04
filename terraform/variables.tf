variable "environment" {
  type    = string
  default = "dev"
}

variable "aws_region" {
  type    = string
  default = "ap-northeast-1"
}

variable "commit_sha" {}

variable "aws_profile" {
  type    = string
  default = ""
}
