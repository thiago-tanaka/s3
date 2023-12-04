## read csv file from s3 bucket and save to database table


### insert your aws credentials in the .env file

```dotenv
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_access_key
AWS_DEFAULT_REGION=your_aws_region
AWS_BUCKET=your_bucket_name
```

### run the following command
    
```bash
php artisan products:create-from-csv    
```
