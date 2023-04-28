# MENTOR
is a comprehensive **learning management system**
designed to support teachers and students in online learning 
environments. Our platform offers a range of features to 
facilitate virtual learning, including course management 
tools, communication systems, assessment and evaluation tools, 
and analytics and reporting capabilities. We're dedicated to 
providing a seamless online learning experience for both 
educators and learners, and our platform is designed to be 
user-friendly, flexible, and customizable. Join us in 
revolutionizing online education and empowering the next 
generation of learners.
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

#### In some resource folders (documents, others, videos) They have subdirectories like below
documents  
&nbsp;&nbsp;|__grade_id  
&nbsp;&nbsp;&nbsp;&nbsp;|__subject_id  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__file1  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__file2
  
  

### Fix file size limit in server:  
In the `php.ini` file, find the `upload_max_filesize` and `post_max_size` settings 
    and increase the limit to the desired value, such as `upload_max_filesize = 64M` and `post_max_size = 64M` for a 64 MB limit.
