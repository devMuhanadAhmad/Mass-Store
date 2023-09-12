<x-front breadcrumb="Contact Us">
    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
       <div class="container">
           <div class="contact-head">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2>Contact Us</h2>
                           <p>If there is any question or problem, contact technical support, send a message with the problem</p>
                       </div>
                   </div>
               </div>
               <div class="contact-info">
                   <div class="row">
                       <div class="col-lg-4 col-md-12 col-12">
                           <div class="single-info-head">
                               <!-- Start Single Info -->
                               <div class="single-info">
                                   <i class="lni lni-map"></i>
                                   <h3>Address</h3>
                                   <ul>
                                       <li>{{config('contact.address')}}</li>
                                   </ul>
                               </div>
                               <!-- End Single Info -->
                               <!-- Start Single Info -->
                               <div class="single-info">
                                   <i class="lni lni-phone"></i>
                                   <h3>Call us on</h3>
                                   <ul>
                                       <li><a href="tel:+18005554400">{{config('contact.phone')}} (Toll free)</a></li>
                                   </ul>
                               </div>
                               <!-- End Single Info -->
                               <!-- Start Single Info -->
                               <div class="single-info">
                                   <i class="lni lni-envelope"></i>
                                   <h3>Mail at</h3>
                                   <ul>
                                       <li><a href="mailto:support@shopgrids.com">{{config('contact.email')}}</a>
                                       </li>
                                   </ul>
                               </div>
                               <!-- End Single Info -->
                           </div>
                       </div>
                       <div class="col-lg-8 col-md-12 col-12">
                        <x-flash-message />

                           <div class="contact-form-head">

                               <div class="form-main">

                                   <form class="form" method="post" action="{{route('front.conactUs.store')}}">
                                    @csrf
                                       <div class="row">
                                           <div class="row col-12">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group ">
                                                    <x-form.input class="col-6" type="email" name="email" placeholder="Enter email"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group ">
                                                    <x-form.input class="col-6" type="tel" name="phone" placeholder="Enter Phone"/>
                                                </div>
                                            </div>
                                        </div>
                                               <div class="form-group message">
                                                   <x-form.textarea name="message" placeholder="Your Message"/>
                                               </div>

                                           <div class="col-12">
                                               <div class="form-group button">
                                                   <button type="submit" class="btn ">Submit Message</button>
                                               </div>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!--/ End Contact Area -->

   </x-front>
