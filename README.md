# MENTOR
## Learning Management System..
> This is the project we are developing for our second year group project.

## public resources folder structure

*This folder is for store files (videos/pdfs/images/etc.)*
`PATH => public/public_resources`

### public_resources
- documents
- others
- quiz_images
- temp
- videos  


  
  

### Fix file size limit in server:  
In the `php.ini` file, find the `upload_max_filesize` and `post_max_size` settings 
    and increase the limit to the desired value, such as `upload_max_filesize = 64M` and `post_max_size = 64M` for a 64 MB limit.
