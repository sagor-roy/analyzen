<p align="center"><a href="https://analyzen.com" target="_blank"><img src="https://www.mssplatform.com/assets/img/partner/analyzen-logo.png" width="400" alt="Laravel Logo"></a></p>


## প্রজেক্টের বর্ণনা:

এটি একটি ছোট কুইজ টেস্ট এপ্লিকেশন। এই এপ্লিকেশন এর মাধ্যমে একাধিক ইউসার কুইজ টেস্টে অংশগ্রহণ করতে পারবেন। তবে ইউসার কুইজ টেস্টে অংশগ্রহণ করার পূর্বে তাকে অবশ্যই approval ইউসার হতে হবে। যদি ইউসার approval ইউসার হয়ে থাকে তাহলে এডমিন কোনো কুইজ টেস্টে অংশগ্রহণ করার জন্য পারমিশন দিলে ওই ইউসার কুইজ টি খেলতে পারবেন এবং কুইজ সাবমিট করার সাথে সাথে তার রেজাল্ট দেখতে পারবেন। এই এপ্লিকেশন এর সমস্ত functionality এডমিন তার নিজের মতো করে হ্যান্ডেল করতে পারবেন।  আমরা এগুলা নিয়ে নিচে বিস্তারিত আলোচনা করবো। তবে চলুন এই ছোট প্রজেক্টি কিভাবে আপনার লোকাল মেশিনে সেটআপ করবেন। 

- এই ছোট প্রজেক্টি সেটআপ করার জন্য আপনার মেশিনে অবশ্যই একটি লোকাল সার্ভার ইনস্টল করতে হবে। সেটি হতে পারে [Xampp](https://www.apachefriends.org/) , [WampServer](https://www.wampserver.com/en/download-wampserver-64bits/) অথবা [Laragon](https://laragon.org/). তবে লোকাল সার্ভারটি ইনস্টল করার পূর্বে অবশ্যই PHP >= ৮.০ এর সমান অথবা উপরের কোনো লেটেস্ট ভার্সন দেখে ইনস্টল করতে হবে এবং সাথে [composer.exe](https://getcomposer.org/download/) ইনস্টল করতে হবে। যদি লোকাল সার্ভারটি ইনস্টল করতে সমস্যা হয় তাহলে আমি একটি ইউটুবের ভিডিও লিংক শেয়ার করলাম এখন থেকে বিস্তারিত দেখে নিবেন [How to install Xammp Server in windows](https://youtu.be/FG_tpCCFwOQ)
- প্রথমে প্রজেক্টি গিটহাব থেকে clone করে নিবেন। ক্লোন করা হয়ে গেলে composer install নামে কম্যান্ড টি দিতে হবে। এই command এর মাধ্যমে আমাদের প্রজেক্টের প্রয়োজনীয় প্যাকেজ গুলো vendor ফোল্ডারে ডাউনলোড হয়ে যাবে। 
- প্রজেক্টের ভীতরে .env.example নামে একটি ফাইল আছে সেটিকে duplicate করে rename করুন এবং এটির নাম .env দিতে হবে। 
- এবার একটি ডাটাবেস তৈরি করুন। ডাটাবেস হিসাবে আমরা Mysql ব্যবহার করেছি। ডাটাবেস যদি তৈরী করা হয়ে থাকে তাহলে সেই ডাটাবেসের নামটি .env ফাইলের মধ্যে connect করুন। 
- >php artisan serve
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
