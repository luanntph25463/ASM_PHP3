    @extends('include.layouts')
    @section('content')

    <!-- Home -->
    <div class="home">

        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{ route('trangchu') }}">Home</a></li>
                                <li><a href="courses.html">Courses</a></li>
                                <li>Course Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course -->

    <div class="course">
        <div class="container">
            <div class="row">

                <!-- Course -->
                <div class="col-lg-8">

                    <div class="course_container">
                        <div class="course_title">{{$courses->name}}</div>
                        <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Teacher:</div>
                                <div class="course_info_text"><a href="#">{{$courses->name}}</a></div>
                            </div>

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Reviews:</div>
                                @if ($courses->DanhGia > 4)
                                <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                @elseif ($courses->DanhGia > 3)
                                <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i></div>
                                @elseif ($courses->DanhGia > 2)
                                <div class="rating_r rating_r_4"><i></i><i></i><i></i></div>
                                @elseif ($courses->DanhGia > 1)
                                <div class="rating_r rating_r_4"><i></i><i></i></div>
                                @elseif ($courses->DanhGia > 0)
                                <div class="rating_r rating_r_4"><i></i></div>
                                @endif
                            </div>

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Categories:</div>
                                <div class="course_info_text"><a href="#">{{$courses->tenDM}}</a></div>
                            </div>

                        </div>

                        <!-- Course Image -->
                        <div class="course_image"><img src="{{$courses->image}}" alt=""></div>

                        <!-- Course Tabs -->
                        <div class="course_tabs_container">
                            <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                <div class="tab active">description</div>
                                <div class="tab">curriculum</div>
                                <div class="tab">reviews</div>
                            </div>
                            <div class="tab_panels">

                                <!-- Description -->
                                <div class="tab_panel active">
                                    <div class="tab_panel_title">Software Training</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">
                                            <p>{{$courses->description}}</p>
                                        </div>
                                        <div class="tab_panel_section">
                                            <div class="tab_panel_subtitle">Requirements</div>
                                            <ul class="tab_panel_bullets">
                                                <li>Lorem Ipsn gravida nibh vel velit auctor aliquet. Class aptent taciti sociosquad litora torquent.</li>
                                                <li>Cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat.</li>
                                                <li>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</li>
                                            </ul>
                                        </div>
                                        <div class="tab_panel_section">
                                            <div class="tab_panel_subtitle">What is the target audience?</div>
                                            <div class="tab_panel_text">
                                                <p>This course is intended for anyone interested in learning to master his or her own body.This course is aimed at beginners, so no previous experience with hand balancing skillts is necessary Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium, consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                                            </div>
                                        </div>
                                        <div class="tab_panel_faq">
                                            <div class="tab_panel_title">FAQ</div>

                                            <!-- Accordions -->
                                            <div class="accordions">

                                                <div class="elements_accordions">

                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center"><div>Can I just enroll in a single course?</div></div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>

                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center active"><div>I'm not interested in the entire Specialization?</div></div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>

                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center"><div>What is the refund policy?</div></div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>

                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center"><div>What background knowledge is necessary?</div></div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>

                                                    <div class="accordion_container">
                                                        <div class="accordion d-flex flex-row align-items-center"><div>Do i need to take the courses in a specific order?</div></div>
                                                        <div class="accordion_panel">
                                                            <p>Lorem ipsun gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Curriculum -->
                                <div class="tab_panel tab_panel_2">
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_title">Software Training</div>
                                        <div class="tab_panel_content">
                                            <div class="tab_panel_text">
                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                            </div>

                                            <!-- Dropdowns -->
                                            <ul class="dropdowns">
                                                <li class="has_children">
                                                    <div class="dropdown_item">
                                                        <div class="dropdown_item_title"><span>Lecture 1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                        <div class="dropdown_item_text">
                                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div class="dropdown_item">
                                                                <div class="dropdown_item_title"><span>Lecture 1.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                                <div class="dropdown_item_text">
                                                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown_item">
                                                                <div class="dropdown_item_title"><span>Lecture 1.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                                <div class="dropdown_item_text">
                                                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="has_children">
                                                    <div class="dropdown_item">
                                                        <div class="dropdown_item_title"><span>Lecture 2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                        <div class="dropdown_item_text">
                                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div class="dropdown_item">
                                                                <div class="dropdown_item_title"><span>Lecture 2.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                                <div class="dropdown_item_text">
                                                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown_item">
                                                                <div class="dropdown_item_title"><span>Lecture 2.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                                <div class="dropdown_item_text">
                                                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="dropdown_item">
                                                        <div class="dropdown_item_title"><span>Lecture 3:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                        <div class="dropdown_item_text">
                                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dropdown_item">
                                                        <div class="dropdown_item_title"><span>Lecture 4:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                        <div class="dropdown_item_text">
                                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dropdown_item">
                                                        <div class="dropdown_item_title"><span>Lecture 5:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                        <div class="dropdown_item_text">
                                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews -->
                                <div class="tab_panel tab_panel_3">
                                    <div class="tab_panel_title">Course Review</div>

                                    <!-- Rating -->
                                    <div class="review_rating_container">
                                        <div class="review_rating">
                                            <div class="review_rating_num">{{$courses->DanhGia}}</div>
                                            <div class="review_rating_stars">
                                                <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                            </div>
                                            <div class="review_rating_text">(28 Ratings)</div>
                                        </div>
                                        <div class="review_rating_bars">
                                            <ul>
                                                <li><span>5 Star</span><div class="review_rating_bar"><div style="width:90%;"></div></div></li>
                                                <li><span>4 Star</span><div class="review_rating_bar"><div style="width:75%;"></div></div></li>
                                                <li><span>3 Star</span><div class="review_rating_bar"><div style="width:32%;"></div></div></li>
                                                <li><span>2 Star</span><div class="review_rating_bar"><div style="width:10%;"></div></div></li>
                                                <li><span>1 Star</span><div class="review_rating_bar"><div style="width:3%;"></div></div></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Comments -->
                                    <div class="comments_container">
                                        @foreach ($reviews as $item)
                                        <ul class="comments_list">
                                            <li>
                                                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                    <div class="comment_image"><div><img src="{{$item->image}}" alt=""></div></div>
                                                    <div class="comment_content">
                                                        <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_author"><a href="#">{{$item->name}}</a></div>
                                                            <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                                            <div class="comment_time ml-auto">{{$item->created_at}} day ago</div>
                                                        </div>
                                                        <div class="comment_text">
                                                            <p>{{$item->content}}</p>
                                                        </div>
                                                        <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>15</span></a></div>
                                                            <div class="comment_extra comment_reply"><a href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach

                                        @if(session()->has('user'))
                                    <form action="{{ route('addComment') }}" method="POST">
                                            <input type="hidden" name="id_course" value="{{$courses->id}}">
                                            <input type="hidden" name="id_user" value="{{session('user')->id}}">
                                            @csrf
                                        <div class="panel-body">
                                            <textarea class="form-control" rows="2" placeholder="What are you thinking?" name="content">
                                            </textarea>
                                            <div class="mar-top clearfix">
                                                <button class="btn btn-sm btn-primary pull-right" type="submit"><i
                                                        class="fa fa-pencil fa-fw"></i> Share</button>
                                                <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                                                <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                                                <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                                            </div>
                                        </div>
                                    </form>
                                    @else

                                    <div class="add_comment_container">
                                        <div class="add_comment_title">Add a review</div>
                                        <div class="add_comment_text">You must be <a href="{{ route('login') }}">logged</a> in to post a comment.</div>
                                    </div>
                                    @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">

                        <!-- Feature -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Course Feature</div>
                            <div class="sidebar_feature">
                                <div class="course_price">$ {{$courses->price}}</div>

                                <!-- Features -->
                                <div class="feature_list">

                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Duration:</span></div>
                                        <div class="feature_text ml-auto">{{$age}} weeks</div>
                                    </div>

                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Lectures:</span></div>
                                        <div class="feature_text ml-auto">10</div>
                                    </div>

                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span>Lectures:</span></div>
                                        <div class="feature_text ml-auto">6</div>
                                    </div>

                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Lectures:</span></div>
                                        <div class="feature_text ml-auto">Yes</div>
                                    </div>

                                    <!-- Feature -->
                                    <div class="feature d-flex flex-row align-items-center justify-content-start">
                                        <div class="feature_title"><i class="fa fa-users" aria-hidden="true"></i><span>Lectures:</span></div>
                                        <div class="feature_text ml-auto">{{$courses->SiSo}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <form  action="{{ route('user.cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart" value="{{$courses->id}}">
                            @if(session()->has('user'))
                            <input type="hidden" name="id_user" value="{{session('user')->id}}">
                            @endif
                            <input type="hidden" name="price" value="{{$courses->price}}">
                        <button type="submit" class="btn-primary py-2 px-5 rounded m-5">Đăng Ký Khóa Học</button>
                        <form>
                        <!-- Feature -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Teacher</div>
                            <div class="sidebar_teacher">
                                <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="teacher_image"><img src="images/teacher.jpg" alt=""></div>
                                    <div class="teacher_title">
                                        <div class="teacher_name"><a href="#">{{$courses->name}}</a></div>
                                        <div class="teacher_position">{{$teachers->specialized}}</div>
                                    </div>
                                </div>
                                <div class="teacher_meta_container">
                                    <!-- Teacher Rating -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Average Rating:</div>
                                        <div class="teacher_meta_text ml-auto"><span>{{$courses->DanhGia}}</span><i class="fa fa-star" aria-hidden="true"></i></div>
                                    </div>
                                    <!-- Teacher Review -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Review:</div>
                                        <div class="teacher_meta_text ml-auto"><span>{{$count}}</span><i class="fa fa-comment" aria-hidden="true"></i></div>
                                    </div>
                                    <!-- Teacher Quizzes -->
                                    <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                        <div class="teacher_meta_title">Quizzes:</div>
                                        <div class="teacher_meta_text ml-auto"><span>600</span><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="teacher_info">
                                    <p>{{$courses->description}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Latest Course -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Latest Khuyến Mãi</div>
                            <div class="sidebar_latest">
                                @foreach ($promotions as   $item)
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image"><div><img src="images/latest_1.jpg" alt=""></div></div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="course.html">{{$item->name}}</a></div>
                                        <div class="latest_price">{{$item->discount}}</div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Latest Course -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="newsletter_background" style="background-image:url(images/newsletter_background.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                        <!-- Newsletter Content -->
                        <div class="newsletter_content text-lg-left text-center">
                            <div class="newsletter_title">sign up for news and offers</div>
                            <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
                        </div>

                        <!-- Newsletter Form -->
                        <div class="newsletter_form_container ml-lg-auto">
                            {{-- <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                                <button type="submit" class="newsletter_button">subscribe</button>
                            </form> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/course.css') }}">
    @endsection
    @section('js')
    <script src="{{ asset('plugins/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('js/course.js') }}"></script>
    @endsection
