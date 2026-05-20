<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.settings') }}
        </h2>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <form action="{{route('dashboard.settings')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
                <h3 class="mt-2 text-lg font-bold">General Settings</h3>
            <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="site_logo" class="!text-base" :value="__('Site Logo')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="site_logo" class="block mt-1 w-full" type="file" name="site_logo" />
                   @if(isset($settings['site_logo']))
                   <img width="80" class="p-0.5 mt-1 border rounded" src="{{asset($settings['site_logo'])}}">
                   @endif
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="call_us" class="!text-base" :value="__('Call Us')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="call_us" class="block mt-1 w-full" type="text" name="call_us" :value="$settings['call_us']?? ''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="mail_us" class="!text-base" :value="__('Email')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="mail_us" class="block mt-1 w-full" type="text" name="mail_us" :value="$settings['mail_us']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="address" class="!text-base" :value="__('Address')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$settings['address'] ??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Social Media</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="facebook" class="!text-base" :value="__('Facebook')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="$settings['facebook']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="instagram" class="!text-base" :value="__('Instagram')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="$settings['instagram']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="linkedin" class="!text-base" :value="__('Linkedin')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin" :value="$settings['linkedin']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="x" class="!text-base" :value="__('X / Twitter')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="x" class="block mt-1 w-full" type="text" name="x" :value="$settings['x']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="youtube" class="!text-base" :value="__('Youtube')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube" :value="$settings['youtube']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Video Content</h3>
                 <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="video_title" class="!text-base" :value="__('Video Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="video_title" class="block mt-1 w-full" type="text" name="video_title" :value="$settings['video_title']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="scroll" class="!text-base" :value="__('Scroll Down')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="scroll" class="block mt-1 w-full" type="text" name="scroll" :value="$settings['scroll']??''" />
                   </div>
              </div>
              {{--  <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="scroll" class="!text-base" :value="__('Scroll Down')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="scroll" class="block mt-1 w-full" type="text" name="scroll" :value="$settings['scroll']??''" />
                   </div>
              </div>  --}}
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">About Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="about_image" class="!text-base" :value="__('About Image')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="about_image" class="block mt-1 w-full" type="file" name="about_image" />
                   @if(isset($settings['about_image']))
                   <img width="80" class="p-0.5 mt-1 border rounded" src="{{asset($settings['about_image'])}}">
                   @endif
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Sevice Settings</h3>
                 <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="service_title" class="!text-base" :value="__('Service Title ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="service_title" class="block mt-1 w-full" type="text" name="service_title" :value="$settings['service_title']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="service_content" class="!text-base" :value="__('Service Content ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="service_content" class="block mt-1 w-full" type="text" name="service_content" :value="$settings['service_content']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="service_link" class="!text-base" :value="__('Service Link ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="service_link" class="block mt-1 w-full" type="text" name="service_link" :value="$settings['service_link']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Feature Settings</h3>
                 <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_header" class="!text-base" :value="__('Feature Header ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_header" class="block mt-1 w-full" type="text" name="feature_header" :value="$settings['feature_header']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_title" class="!text-base" :value="__('Feature Title ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_title" class="block mt-1 w-full" type="text" name="feature_title" :value="$settings['feature_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_content" class="!text-base" :value="__('Feature content ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_content" class="block mt-1 w-full" type="text" name="feature_content" :value="$settings['feature_content']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_one" class="!text-base" :value="__('Feature One ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_one" class="block mt-1 w-full" type="text" name="feature_one" :value="$settings['feature_one']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_two" class="!text-base" :value="__('Feature Two ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_two" class="block mt-1 w-full" type="text" name="feature_two" :value="$settings['feature_two']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_three" class="!text-base" :value="__('Feature Three ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_three" class="block mt-1 w-full" type="text" name="feature_three" :value="$settings['feature_three']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_donate" class="!text-base" :value="__('Feature Donate ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_donate" class="block mt-1 w-full" type="text" name="feature_donate" :value="$settings['feature_donate']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="feature_joinus" class="!text-base" :value="__('Feature Join Us ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="feature_joinus" class="block mt-1 w-full" type="text" name="feature_joinus" :value="$settings['feature_joinus']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Causes Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="cause_header" class="!text-base" :value="__('Cause Header ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="cause_header" class="block mt-1 w-full" type="text" name="cause_header" :value="$settings['cause_header']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="cause_title" class="!text-base" :value="__('Cause Title ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="cause_title" class="block mt-1 w-full" type="text" name="cause_title" :value="$settings['cause_title']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="cause_raised" class="!text-base" :value="__('Cause Raised ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="cause_raised" class="block mt-1 w-full" type="text" name="cause_raised" :value="$settings['cause_raised']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="cause_link" class="!text-base" :value="__('Cause Link ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="cause_link" class="block mt-1 w-full" type="text" name="cause_link" :value="$settings['cause_link']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Support Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="support_title" class="!text-base" :value="__('Support Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="support_title" class="block mt-1 w-full" type="text" name="support_title" :value="$settings['support_title']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="support_content" class="!text-base" :value="__('Support Content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="support_content" class="block mt-1 w-full" type="text" name="support_content" :value="$settings['support_content']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="support_donate" class="!text-base" :value="__('Support Donate ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="support_donate" class="block mt-1 w-full" type="text" name="support_donate" :value="$settings['support_donate']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="support_joinus" class="!text-base" :value="__('Support Join Us ')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="support_joinus" class="block mt-1 w-full" type="text" name="support_joinus" :value="$settings['support_joinus']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Events Settings</h3>
                  <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="event_header" class="!text-base" :value="__('Event Header')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="event_header" class="block mt-1 w-full" type="text" name="event_header" :value="$settings['event_header']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="event_title" class="!text-base" :value="__('Event Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="event_title" class="block mt-1 w-full" type="text" name="event_title" :value="$settings['event_title']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Donation Settings</h3>
                 <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="donation_title" class="!text-base" :value="__('Donation Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="donation_title" class="block mt-1 w-full" type="text" name="donation_title" :value="$settings['donation_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="donation_content" class="!text-base" :value="__('Donation content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="donation_content" class="block mt-1 w-full" type="text" name="donation_content" :value="$settings['donation_content']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="donation_link" class="!text-base" :value="__('Donation link')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="donation_link" class="block mt-1 w-full" type="text" name="donation_link" :value="$settings['donation_link']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Teams Settings</h3>
                 <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="team_title" class="!text-base" :value="__('Team Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="team_title" class="block mt-1 w-full" type="text" name="team_title" :value="$settings['team_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="team_content" class="!text-base" :value="__('Team content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="team_content" class="block mt-1 w-full" type="text" name="team_content" :value="$settings['team_content']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Testimonial Settings</h3>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="testimonial_title" class="!text-base" :value="__('Testimonial Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="testimonial_title" class="block mt-1 w-full" type="text" name="testimonial_title" :value="$settings['testimonial_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="testimonial_content" class="!text-base" :value="__('Testimonial content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="testimonial_content" class="block mt-1 w-full" type="text" name="testimonial_content" :value="$settings['testimonial_content']??''" />
                   </div>
              </div>
               <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Subscribe Settings</h3>
                  <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="subscribe_title" class="!text-base" :value="__('Subscribe Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="subscribe_title" class="block mt-1 w-full" type="text" name="subscribe_title" :value="$settings['subscribe_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="subscribe_content" class="!text-base" :value="__('Subscribe content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="subscribe_content" class="block mt-1 w-full" type="text" name="subscribe_content" :value="$settings['subscribe_content']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Contact Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="contact_header" class="!text-base" :value="__('Contact Header')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="contact_header" class="block mt-1 w-full" type="text" name="contact_header" :value="$settings['contact_header']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="contact_title" class="!text-base" :value="__('Contact Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="contact_title" class="block mt-1 w-full" type="text" name="contact_title" :value="$settings['contact_title']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="form_title" class="!text-base" :value="__('Form Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="form_title" class="block mt-1 w-full" type="text" name="form_title" :value="$settings['form_title']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="form_content" class="!text-base" :value="__('Form content')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="form_content" class="block mt-1 w-full" type="text" name="form_content" :value="$settings['form_content']??''" />
                   </div>
              </div>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="form_button" class="!text-base" :value="__('Form Button')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="form_button" class="block mt-1 w-full" type="text" name="form_button" :value="$settings['form_button']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Office Settings</h3>
                  <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="office_title" class="!text-base" :value="__('office Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="office_title" class="block mt-1 w-full" type="text" name="office_title" :value="$settings['office_title']??''" />
                   </div>
              </div>
                 <hr class="mt-2">
                    <h3 class="mt-2 text-lg font-bold">Quick Links Settings</h3>
                      <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="aboutus_title" class="!text-base" :value="__('About Us Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="aboutus_title" class="block mt-1 w-full" type="text" name="aboutus_title" :value="$settings['aboutus_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="contactus_title" class="!text-base" :value="__('Contact Us Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="contactus_title" class="block mt-1 w-full" type="text" name="contactus_title" :value="$settings['contactus_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="ourservices_title" class="!text-base" :value="__('Our Services Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="ourservices_title" class="block mt-1 w-full" type="text" name="ourservices_title" :value="$settings['ourservices_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="terms_title" class="!text-base" :value="__('Terms & Condition Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="terms_title" class="block mt-1 w-full" type="text" name="terms_title" :value="$settings['terms_title']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="supports_title" class="!text-base" :value="__('Supports Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="supports_title" class="block mt-1 w-full" type="text" name="supports_title" :value="$settings['supports_title']??''" />
                   </div>
              </div>
                <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Business Hours Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business_title" class="!text-base" :value="__('Business Title')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business_title" class="block mt-1 w-full" type="text" name="business_title" :value="$settings['business_title']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business1_day" class="!text-base" :value="__('Busines One Days')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business1_day" class="block mt-1 w-full" type="text" name="business1_day" :value="$settings['business1_day']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business1_hour" class="!text-base" :value="__('Busines One Hours')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business1_hour" class="block mt-1 w-full" type="text" name="business1_hour" :value="$settings['business1_hour']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business2_day" class="!text-base" :value="__('Busines Two Days')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business2_day" class="block mt-1 w-full" type="text" name="business2_day" :value="$settings['business2_day']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business2_hour" class="!text-base" :value="__('Busines Two Hours')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business2_hour" class="block mt-1 w-full" type="text" name="business2_hour" :value="$settings['business2_hour']??''" />
                   </div>
              </div>
               <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business3_day" class="!text-base" :value="__('Busines Three Days')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business3_day" class="block mt-1 w-full" type="text" name="business3_day" :value="$settings['business3_day']??''" />
                   </div>
              </div>
              <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="business3_hour" class="!text-base" :value="__('Busines Three Hours')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="business3_hour" class="block mt-1 w-full" type="text" name="business3_hour" :value="$settings['business3_hour']??''" />
                   </div>
              </div>
              <hr class="mt-2">
                <h3 class="mt-2 text-lg font-bold">Site Name Settings</h3>
                <div class="grid grid-cols-4 md:max-w-2xl items-center mt-4">
              <div>
                  <x-input-label for="site_name" class="!text-base" :value="__('Site Name')" />
                </div>
                <div class="col-span-2">
                   <x-text-input id="site_name" class="block mt-1 w-full" type="text" name="site_name" :value="$settings['site_name']??''" />
                   </div>
              </div>
              <x-primary-button class="mt-6">Save</x-primary-button>
            </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

