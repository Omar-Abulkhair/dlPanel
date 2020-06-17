<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('dashboard._partials.head')
{{----}}
<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="@yield('wrapper', 'content-wrapper')">

        <div class="content-body">
            <!-- maintenance -->
            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                    <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="../../../app-assets/images/pages/not-authorized.png" class="img-fluid align-self-center" alt="branding logo">
                                <h1 class="font-large-2 my-2">You are not authorized!</h1>
                                <p class="p-2">
                                    paraphonic unassessable foramination Caulopteris worral Spirophyton encrimson esparcet aggerate chondrule
                                    restate whistler shallopy biosystematy area bertram plotting unstarting quarterstaff.
                                </p>
                                <a class="btn btn-primary btn-lg mt-2" href="/">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- maintenance end -->
        </div>
    </div>
</div>

</body>
</html>
