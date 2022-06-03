<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p> -->

<!-- <p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

# Project Introduction
This is a Hospital Management System developed using- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"></a></p> 
It's a client based project meaning the software is being used this very moment while you are reading this article. I will try to cover all the sections of this project and discuss the modular approach taken while development.

## Institution
The institution using this software is [Mainamati Cantonment General Hospital](https://www.google.com/maps/uv?pb=!1s0x37547f249815015b%3A0xc38b548542466e20!3m1!7e115!4shttps%3A%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipOEM3eDl26Nti4K62e46qm2PhDwGmehQxaZi_NK%3Dw266-h200-k-no!5smoynamoti%20cantonment%20general%20hospital%20-%20Google%20Search!15sCgIgAQ&imagekey=!1e10!2sAF1QipOEM3eDl26Nti4K62e46qm2PhDwGmehQxaZi_NK&hl=en&sa=X&ved=2ahUKEwijufrw6ZH4AhWA6jgGHV26AR8Qoip6BAheEAM).
<br>

<p><img src="https://lh5.googleusercontent.com/B_UXYhpXlGyn3Ed9eT5zTl1NeZPYS6pxzZlAS4Uqn2kgD3CbtfA1eJDtiXVdsvOA=w1080-k-no" width="32%"><img style="padding:0% 1.5%;" src="https://lh3.googleusercontent.com/p/AF1QipP8HOFErQl22QY9GBeINIEN8YnLxroSVEkOagTk=s1600-w400" width="32%"><img src="https://lh3.googleusercontent.com/p/AF1QipNpC-MTFS4WAjVmnrop7uvhHPo63nXJv6ojJlmk=s1600-w400" width="32%"></p>

<p style="display:grid; grid-template-columns: 1fr 1fr;">
<a href="https://goo.gl/maps/ebSYf71tfHrybSoHA" target="_blank"><img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/7b95d423735b73db7f17a57127a37826af724f20/MCGH/map%20resized.gif" width="400"></a><span style="padding:0px 20px;"><strong>Location:</strong><br> Tipara Bazar, Mainamati. <br>Cumilla cantonment.<br> Cumilla.</span></p>

<br>

# Modular Approach

This project was divided in *`5 different modules`*. I've descriptive videos explaining the modules and giving a project over view within the module scope. 

- **[Module 01](https://www.youtube.com/watch?v=MTerO5RgUCk&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM)**
- **[Module 02](https://www.youtube.com/watch?v=5ydlfNfnQiw&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=2)**
- **[Module 03](https://www.youtube.com/watch?v=8NH-hXiBQ7Y&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=3)**
- **[Module 04](https://www.youtube.com/watch?v=IlqVDxnvaIA&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=4)**
- **[Module 05]()**

Each module dealt with one or more user types.

<br>

# User Authentication

User authentication was a big challenge in this project since I had to authenticate different types of accounts using the same login page. We also had to manage the user access as well thru the whole software. 

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/4e853fca2fc86f6acc44cfa58410c375c31549b6/MCGH/user%20login%20resized.gif" width="100%">

This was much easier because of the Laravel framework and it's built in middleware and routing settings.

## Types of users

There are *`6 types of users`* in our software.

- **Receptionist**
- **Doctor**
- **OT Operator**
- **Nurse**
- **Accountant**
- **Admin**

They all have unique ID templates that separates them while authentication.

<br>

# Receptionist End Overview

Reception is one of the function heavy portions of the software. 

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/2372b06c6d20f57442a02ab77dc3cf34aabd1282/MCGH/reception%20end.gif" width="100%">

## Services

There are *`6 types of services`* that can be provided from the receptionist end.

- Outdoor patient registration.
- Patient admission.
- Pathology section.
- Dental services.
- Physiotherapy.
- Emergency.

Each of these services has there own interface, that I've covered within the video overviews of [Module 01](https://www.youtube.com/watch?v=MTerO5RgUCk&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM), [Module 02](https://www.youtube.com/watch?v=5ydlfNfnQiw&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=2) and [Module 03](https://www.youtube.com/watch?v=8NH-hXiBQ7Y&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=3).

## Invoice Generator

This portion also has a very powerful invoice generator, which not only generates but also filters invoices across all the different types of services.

<br>

# Doctor End Overview

Doctor end is more on the light side when compared with the other ends functionality wish.

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/2372b06c6d20f57442a02ab77dc3cf34aabd1282/MCGH/doctor%20end.gif" width="100%">

## Actions

- Profile setup.
- Patient list browsing.
- Patient confirmation.
- Schedule editor.
- Operation schedule browsing.
- Log browsing.

I've covered all the features in the video overview of [Module 01](https://www.youtube.com/watch?v=MTerO5RgUCk&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM).

<br>

# OT End Overview

OT end has a number of functionality that is mostly connected with other ends. While being comparably light it still has an effective number of functions.

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/2372b06c6d20f57442a02ab77dc3cf34aabd1282/MCGH/ot%20end.gif" width="100%">

## Actions

- Schedule creation and management. 
- Data entry on operated patients.
- Invoice generation.

I've covered all the features in the video overview of [Module 02](https://www.youtube.com/watch?v=5ydlfNfnQiw&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=2).

<br>

# Nurse End Overview

Nurse end will deal with the admitted patients from reception end. This has a moderate amount of functions and does a lot of patent data tracking.

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/7b95d423735b73db7f17a57127a37826af724f20/MCGH/nurse%20end%20resized.gif" width="100%">

## Actions

- Patient list browsing & filtering.
- Invigilator tracking.
- Providing other services.
- Tracking provided services.
- Generating virtual patient chart.

I've covered all the features in the video overview of [Module 02](https://www.youtube.com/watch?v=5ydlfNfnQiw&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=2).

<br>

# Accounts End Overview

Accounts is the second most feature heavy portion after admin. Everything related to transactions is tracked by this portion.

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/7b95d423735b73db7f17a57127a37826af724f20/MCGH/accountant%20end%20resized.gif" width="100%">

## Actions

- Profile setup.
- Important variable setup.
- Income tracking.
- Receptionist cash check-in.
- Salary payment. 
- Creditor management.
- Admitted patient list browsing.
- Issuing patient release.
- Invoice generation.
- Ambulance expense tracking.
- Other expenses tracking.
- Log browsing & filtering.

I've covered all the features in the video overview of [Module 04](https://www.youtube.com/watch?v=IlqVDxnvaIA&list=PLDUEQZsaflJpikGaAtrMAbCw9L78pfarM&index=4).

<br>

# Admin End Overview

This has authority over the whole system. So It is packed with functionality. 

<img src="https://rawcdn.githack.com/Thasinmahmudbd/project-media/336156a16ab31b86f24d59fdfb1f165b52174e15/MCGH/admin%20end%20resized.gif" width="100%">

## Actions

- Profile setup.
- Dashboard browsing.
- Built in personal & global activity log.
- Income summarization.
- Logs filtering.
- Employee status control.
- Employee add, edit & delete privileges.
- Bed add, edit & delete privileges.
- Bed status preview.
- Pathology services add, edit & delete privileges.
- Dental services add, edit & delete privileges.
- Other services add, edit & delete privileges.

I've covered the entirety of this end in the video overview of [Module 05]().

<br>

# Requirement

Now let's discuss the minimal hardware & software requirements to run this software.
## Hardware
|End      |Processor                 |RAM       |HDD        |
|---      |---                       |---       |---        |
|Client   |Intel Core i3 (4th gen)   |2 GB      |80 GB      |
|Server   |AMD Ryzen 7               |32 GB     |120 GB     |

## Software
|Topics             |Specifications             |
|---                |---                        |
|OS                 |Windows 7/8/8.1/10/11      |
|Front End          |HTML, CSS, JavaScript      |
|Back End           |PHP 8.0.7                  |
|Framework          |LARAVEL 8.49.2             |
|Database           |MySQL                      |
|Tools              |XAMPP                      |


<br>

# Limitations
There were some conditions given between development.
- Server will not be connected to internet. 
- LAN connections will be maintained between server and client devices for data transfer purposes.

Based on these conditions some problems were introduced
- Any kind of frontend framework were crossed of the chart while development.
- All assets were self build in the software.
- A built in framework was designed and developed, later used in the front end development.

<br>

# Issues

Currently no known Issues.




