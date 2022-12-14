<p align="center"><a href="https://analyzen.com" target="_blank"><img src="https://www.mssplatform.com/assets/img/partner/analyzen-logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center"><b>Note</b> : The documentation A to Z must be read carefully</p>

## প্রজেক্টের বর্ণনা: ( version-1.1 )

এটি একটি ছোট কুইজ টেস্ট এপ্লিকেশন (ডকুমেন্টেশনে যেভাবে বলা হয়েছে)। এই এপ্লিকেশন এর মাধ্যমে একাধিক ইউসার কুইজ টেস্টে অংশগ্রহণ করতে পারবেন। তবে ইউসার কুইজ টেস্টে অংশগ্রহণ করার পূর্বে তাকে অবশ্যই approval ইউসার হতে হবে। যদি ইউসার approval ইউসার হয়ে থাকে তাহলে এডমিন কোনো কুইজ টেস্টে অংশগ্রহণ করার জন্য পারমিশন দিলে ওই ইউসার কুইজ টি খেলতে পারবেন এবং কুইজ সাবমিট করার সাথে সাথে তার রেজাল্ট দেখতে পারবেন। এই এপ্লিকেশন এর সমস্ত functionality এডমিন তার নিজের মতো করে হ্যান্ডেল করতে পারবেন।  আমরা এগুলা নিয়ে নিচে বিস্তারিত আলোচনা করবো। তবে চলুন এই ছোট প্রজেক্টি কিভাবে আপনার লোকাল মেশিনে সেটআপ করবেন। 

- এই ছোট প্রজেক্টি সেটআপ করার জন্য আপনার মেশিনে অবশ্যই একটি লোকাল সার্ভার ইনস্টল করতে হবে। সেটি হতে পারে [Xampp](https://www.apachefriends.org/) , [WampServer](https://www.wampserver.com/en/download-wampserver-64bits/) অথবা [Laragon](https://laragon.org/). তবে লোকাল সার্ভারটি ইনস্টল করার পূর্বে অবশ্যই PHP >= ৮.০ এর সমান অথবা উপরের কোনো লেটেস্ট ভার্সন দেখে ইনস্টল করতে হবে এবং সাথে [composer.exe](https://getcomposer.org/download/) ইনস্টল করতে হবে। যদি লোকাল সার্ভারটি ইনস্টল করতে সমস্যা হয় তাহলে আমি একটি ইউটুবের ভিডিও লিংক শেয়ার করলাম এখন থেকে বিস্তারিত দেখে নিবেন [How to install Xammp Server in windows](https://youtu.be/FG_tpCCFwOQ)
- প্রথমে প্রজেক্টি গিটহাব থেকে clone করে নিবেন। ক্লোন করা হয়ে গেলে composer install নামে কম্যান্ড টি দিতে হবে। এই command এর মাধ্যমে আমাদের প্রজেক্টের প্রয়োজনীয় প্যাকেজ গুলো vendor ফোল্ডারে ডাউনলোড হয়ে যাবে। 
- প্রজেক্টের ভীতরে .env.example নামে একটি ফাইল আছে সেটিকে duplicate করে rename করুন এবং এটির নাম .env দিতে হবে। 
- এবার একটি ডাটাবেস তৈরি করুন। ডাটাবেস হিসাবে আমরা Mysql ব্যবহার করেছি। ডাটাবেস যদি তৈরী করা হয়ে থাকে তাহলে সেই ডাটাবেসের নামটি .env ফাইলের মধ্যে connect করুন। 
```
php artisan key:generate
php artisan migrate
```
- সবকিছু ঠিক থাকলে উপরের cmd run করেন এবং এবং নিচের cmd টি অবশ্যই run করতে হবে php artisan db:seed এই cmd চালানোর পর কিছু Fake Data তৈরী হবে সাথে দুইটি Approval একাউন্ট তৈরী হবে।
```
php artisan db:seed
```
- প্রজেক্টি run করার জন্য নিচের cmd run করুন এবং সবকিছু ঠিক থাকলে [http://127.0.0.1:8000/](http://127.0.0.1:8000/) এই এড্রেস টি ব্রাউজার হিট করুন। 
```
php artisan serve
```

## লগইন

- শুরুতেই আপনি একটি লগইন ফর্ম দেখতে পাবেন। এই লগইন ফর্মের মাধ্যমে Admin এবং User তার Approval একাউন্ট দিয়ে দুইজনেই তার নিজ নিজ Dashboard যেতে পারবেন এবং এখানে Register করার জন্য যে ফর্ম দেখা হয়েছে শুধুমাত্র User এর জন্য। আমরা জানি Admin এর জন্য Register ফর্ম থাকেনা। 
- যদি কোনো user রেজিস্টার করে থাকেন তাহলে তাকে সাথে সাথে লগইন করতে দেয়া হবে না যতক্ষণ না পর্যন্ত Admin তাকে Approved করবে ততক্ষন পর্যন্ত User তার Dashboard এ যেতে পারবেনা। 
- নিচে দুটি Approval একাঊন্ট দেয়া হলো Check করার জন্য। 
```
admin@gmail.com
password : 000000

user@gmail.com
password : 000000
```
# Admin Dashboard

## User List

- আপনি যদি অ্যাডমিন হিসাবে লগইন করেন তাহলে সাইডবারে User List নামে একটি লিংক দেখতে পাচ্ছেন এবং সেখানে ক্লিক করুন।
- ক্লিক করার পর এখানে সমস্ত User এর লিস্ট দেখানো হয়েছে শুধু অ্যাডমিন বাদে।
- আপনি এই User List থেকে একজন User কে Approved এবং Reject করতে পারবেন সাথে User এর Details View ,Edit ,Delete সবকিছুই করতে পারবেন।

## Add Quiz

- আপনি Add Quiz লিংকে ক্লিক করলে আপনার তৈরী করা Quiz লিস্ট দেখতে পারবেন এবং নতুন Quiz তৈরী করতে চাইলে উপরের ডান পাশে Add Quiz বাটনে ক্লিক করুন এবং ক্লিক করলে একটি Modal popup হবে। সেই Modal এ আপনার ইনফরমেশন দিয়ে কুইজ তৈরী করুন।
- Quiz তৈরী করা হলে সেই কুইজ এর Under এ আপনি Question তৈরী করতে পারবেন এবং সেখানে Create Question নামে একটি বাটন দেখতে পাচ্ছেন। এই বাটন এ ক্লিক করলে আপনার Question তৈরী হয়ে যাবে সাথে Quiz টি Edit, Delete সবকিছুই করতে পারবেন।  
- একটি কুইজ এর under এ কতগুলো Question আছে তা দেখতে চাইলে View Question নামের বাটন এ ক্লিক করুন এবং ক্লিক করলে ওই Quiz এর যতগুলো Question আছে সব দেখতে পারবেন সাথে Question গুলা Edit , Delete করতে পারবেন।

## Exam Attend

- Exam Attend বাটন এ ক্লিক করলে আপনি এখান থেকে Exam Group তৈরী করতে পারবেন। উপরের ডান পাশে Add Exam Group নামের বাটন এ ক্লিক করুন। ক্লিক করলে একটি Modal Popup হয়ে আসবে এবং প্রথমে Quiz সিলেক্ট করতে হবে তারপর ওই Quiz এর একটি সময় নির্ধারন করে দিতে পারবেন এবং যেই সময় টা নির্ধারণ করবেন User কে সেই সময়ের মধ্যেই Quiz টি Submit করতে হবে নতুবা Quiz টি Reject বলে গণ্য করা হবে। তারপর ওই Quiz টি কোন কোন User Attend করতে পারবেন তাদেরকে সিলেক্ট করুন।
- যেসমস্ত User কে সিলেক্ট করেছেন শুধুমাত্র ওই User রাই Quiz টি খেলতে পারবেন।
- Exam Group টি তৈরী করা হয়ে গেলে আপনার সিলেক্ট করা Quiz এর টাইটেল এবং সিলেক্ট করা User / Candidate দেখতে পাবেন।
- তারপর সেখানে View Result নামে একটি বাটন আছে এই বাটন এ ক্লিক করলে আপনি যে যে User কে সিলেক্ট করেছেন তারা Quiz টি খেলে থাকলে তাদের রেজাল্ট দেখতে পারবেন এবং প্রত্যেক - User এর View Details নামের একটি বাটন আছে সেই বাটন এ ক্লিক করলে ওই User টি কোন কোন Question এর ভুল / সঠিক  answer করেছেন তা সবুজ=correct  এবং লাল=wrong Alert এর মাধ্যমে চিহ্নিত করা হয়েছে সাথে Pass Mark এবং Toatal Score দেখানো হয়েছে। 
- এখানে প্রতিটি Question এর  Mark ৫ করে ধরা হয়েছে এবং যতগুলা Question থাকবে তার উপর নির্ভর করে ৭০% Mark পেতে হবে।
- একটি কুইজ একজন User একবার খেলে থাকলে ওই Quiz টি আর দ্বিতীয় বার খেলতে পারবেনা।

### What I used

- Use laravel, MySql
- Laravel custom multiple Authentication with role
- Custom middleware
- Using Trait
- Using migration, factory, seeder
- Using notiy toaster
- Logical & functional clean code
- Highly secured

### Support 

- প্রজেক্টি রান করতে বা কোথাও বুঝতে প্রবলেম হলে যোগাযোগ করতে পারেন।
- sagorroy204@gmail.com
