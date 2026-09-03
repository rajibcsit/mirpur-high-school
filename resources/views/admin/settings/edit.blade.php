@extends('layouts.admin')

@section('title', 'School Settings')
@section('page-title', 'School Settings')

@section('content')
<div class="min-h-screen bg-gray-50/50">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 flex items-start gap-3">
            <div class="flex-shrink-0">
                <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <div class="flex-1">
                <h4 class="font-semibold text-green-800">
                    Settings Updated
                </h4>
                <p class="text-sm text-green-700 mt-1">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.36h15.6a2 2 0 001.73-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>

                <div>
                    <h4 class="font-semibold text-red-800">
                        Please fix the following errors:
                    </h4>

                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    {{-- Page Header --}}
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10.5 6h3m-7.5 6h15m-15 6h9M6 3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6a3 3 0 013-3z"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                            School Settings
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage your school's website information and appearance.
                        </p>
                    </div>
                </div>
            </div>

            <a href="{{ route('home') }}"
               target="_blank"
               class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium shadow-sm hover:bg-gray-50 hover:border-gray-300 transition">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>

                View Website
            </a>

        </div>
    </div>


    <form action="{{ route('admin.settings.update') }}"
          method="POST"
          enctype="multipart/form-data"
          id="settingsForm">

        @csrf
        @method('PUT')


        {{-- Main Grid --}}
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">


            {{-- Sidebar Navigation --}}
            <div class="xl:col-span-3">

                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden xl:sticky xl:top-24">

                    <div class="p-5 border-b border-gray-100">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Settings Menu
                        </p>
                    </div>

                    <nav class="p-3 space-y-1">

                        <a href="#identity"
                           class="settings-nav active flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 20a8 8 0 0116 0"/>
                                </svg>
                            </span>

                            <span>
                                School Identity
                            </span>
                        </a>


                        <a href="#branding"
                           class="settings-nav flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-purple-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>
                                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                                </svg>
                            </span>

                            <span>
                                Logo & Branding
                            </span>
                        </a>


                        <a href="#seo"
                           class="settings-nav flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>
                                </svg>
                            </span>

                            <span>
                                Website & SEO
                            </span>
                        </a>


                        <a href="#contact"
                           class="settings-nav flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-orange-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M3 8l9 6 9-6"/>
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                </svg>
                            </span>

                            <span>
                                Contact Information
                            </span>
                        </a>


                        <a href="#social"
                           class="settings-nav flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-pink-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M7 8h10M7 12h5"/>
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                                </svg>
                            </span>

                            <span>
                                Social Links
                            </span>
                        </a>


                        <a href="#footer"
                           class="settings-nav flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">

                            <span class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </span>

                            <span>
                                Footer
                            </span>
                        </a>

                    </nav>

                    {{-- Help Box --}}
                    <div class="m-4 p-4 rounded-xl bg-primary/5 border border-primary/10">
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                            </svg>

                            <div>
                                <p class="text-xs font-semibold text-gray-800">
                                    Quick Tip
                                </p>

                                <p class="text-xs text-gray-500 mt-1 leading-5">
                                    Changes made here will automatically appear across your website.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Main Content --}}
            <div class="xl:col-span-9 space-y-6">


                {{-- School Identity --}}
                <section id="identity"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-blue-50/70 to-white">
                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 20a8 8 0 0116 0"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    School Identity
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Basic information about your school.
                                </p>
                            </div>

                        </div>
                    </div>


                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- School Name --}}
                            <div class="md:col-span-2">
                                <label class="form-label">
                                    School Name
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">
                                    <input type="text"
                                           name="school_name"
                                           value="{{ old('school_name', $settings->school_name) }}"
                                           required
                                           class="form-input pl-11"
                                           placeholder="Enter your school name">

                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-width="2"
                                              d="M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                                        <path stroke-linecap="round" stroke-width="2"
                                              d="M4 20a8 8 0 0116 0"/>
                                    </svg>
                                </div>

                                @error('school_name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Short Name --}}
                            <div>
                                <label class="form-label">
                                    Short Name
                                </label>

                                <input type="text"
                                       name="short_name"
                                       value="{{ old('short_name', $settings->short_name) }}"
                                       class="form-input"
                                       placeholder="MHS">

                                <p class="form-help">
                                    Example: MHS, MMLHS
                                </p>
                            </div>


                            {{-- Established Year --}}
                            <div>
                                <label class="form-label">
                                    Established Year
                                </label>

                                <input type="text"
                                       name="established_year"
                                       value="{{ old('established_year', $settings->established_year) }}"
                                       class="form-input"
                                       placeholder="1990">

                            </div>


                            {{-- Tagline --}}
                            <div class="md:col-span-2">
                                <label class="form-label">
                                    School Tagline
                                </label>

                                <input type="text"
                                       name="tagline"
                                       value="{{ old('tagline', $settings->tagline) }}"
                                       maxlength="255"
                                       class="form-input"
                                       placeholder="Excellence in Education">

                                <p class="form-help">
                                    A short slogan displayed beside your school identity.
                                </p>
                            </div>


                            {{-- Principal --}}
                            <div class="md:col-span-2">
                                <label class="form-label">
                                    Principal / Headmaster
                                </label>

                                <input type="text"
                                       name="principal_name"
                                       value="{{ old('principal_name', $settings->principal_name) }}"
                                       class="form-input"
                                       placeholder="Enter principal or headmaster name">
                            </div>

                        </div>
                    </div>
                </section>



                {{-- Logo & Branding --}}
                <section id="branding"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-purple-50/70 to-white">
                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>
                                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Logo & Branding
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Upload your school logo and favicon.
                                </p>
                            </div>

                        </div>
                    </div>


                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            {{-- Logo --}}
                            <div>

                                <label class="form-label">
                                    School Logo
                                </label>

                                <div class="upload-card">

                                    <div id="logoPreview"
                                         class="preview-area">

                                        @if($settings->logo_path)

                                            <img src="{{ asset('storage/'.$settings->logo_path) }}"
                                                 alt="School Logo"
                                                 class="max-h-28 max-w-[250px] object-contain">

                                        @else

                                            <div class="text-center">
                                                <div class="w-14 h-14 mx-auto rounded-xl bg-gray-100 flex items-center justify-center mb-3">
                                                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-width="2"
                                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>
                                                        <rect x="3" y="4" width="18" height="16" rx="2"/>
                                                    </svg>
                                                </div>

                                                <p class="text-sm text-gray-400">
                                                    No logo uploaded
                                                </p>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="mt-4">
                                        <label class="upload-button">

                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-width="2"
                                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 4v12m0-12l-4 4m4-4l4 4"/>
                                            </svg>

                                            Choose Logo

                                            <input type="file"
                                                   name="logo"
                                                   id="logoInput"
                                                   accept="image/jpeg,image/png,image/webp,image/svg+xml"
                                                   class="hidden">

                                        </label>
                                    </div>

                                    <p class="text-xs text-gray-400 mt-3">
                                        JPG, PNG, WEBP or SVG • Maximum 4MB
                                    </p>

                                </div>

                            </div>


                            {{-- Favicon --}}
                            <div>

                                <label class="form-label">
                                    Favicon
                                </label>

                                <div class="upload-card">

                                    <div id="faviconPreview"
                                         class="preview-area">

                                        @if($settings->favicon_path)

                                            <img src="{{ asset('storage/'.$settings->favicon_path) }}"
                                                 alt="Favicon"
                                                 class="w-20 h-20 object-contain">

                                        @else

                                            <div class="text-center">
                                                <div class="w-14 h-14 mx-auto rounded-xl bg-gray-100 flex items-center justify-center mb-3">
                                                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-width="2"
                                                              d="M12 3v18M3 12h18"/>
                                                    </svg>
                                                </div>

                                                <p class="text-sm text-gray-400">
                                                    No favicon uploaded
                                                </p>
                                            </div>

                                        @endif

                                    </div>

                                    <div class="mt-4">

                                        <label class="upload-button">

                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-width="2"
                                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 4v12m0-12l-4 4m4-4l4 4"/>
                                            </svg>

                                            Choose Favicon

                                            <input type="file"
                                                   name="favicon"
                                                   id="faviconInput"
                                                   accept="image/*,.ico"
                                                   class="hidden">

                                        </label>

                                    </div>

                                    <p class="text-xs text-gray-400 mt-3">
                                        Recommended: 512×512 PNG or WEBP • Maximum 2MB
                                    </p>

                                </div>

                            </div>

                        </div>
                    </div>
                </section>



                {{-- Website & SEO --}}
                <section id="seo"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-green-50/70 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Website & SEO
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Configure browser title and search engine information.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6 space-y-6">

                        <div>
                            <label class="form-label">
                                Browser / SEO Title
                            </label>

                            <input type="text"
                                   name="site_title"
                                   value="{{ old('site_title', $settings->site_title) }}"
                                   maxlength="255"
                                   class="form-input"
                                   placeholder="Mirpur High School - Official Website">

                            <p class="form-help">
                                This title will appear in the browser tab and search engine results.
                            </p>
                        </div>


                        <div>

                            <div class="flex items-center justify-between mb-2">

                                <label class="form-label mb-0">
                                    Meta Description
                                </label>

                                <span id="descriptionCounter"
                                      class="text-xs text-gray-400">
                                    0 / 1000
                                </span>

                            </div>

                            <textarea name="site_description"
                                      id="siteDescription"
                                      rows="5"
                                      maxlength="1000"
                                      class="form-input resize-none"
                                      placeholder="Describe your school website...">{{ old('site_description', $settings->site_description) }}</textarea>

                            <p class="form-help">
                                A good meta description can help search engines understand your website.
                            </p>

                        </div>

                    </div>
                </section>



                {{-- Contact --}}
                <section id="contact"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-orange-50/70 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-orange-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M3 8l9 6 9-6"/>
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Contact Information
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Contact details displayed throughout the website.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Email --}}
                            <div>
                                <label class="form-label">
                                    Email Address
                                </label>

                                <div class="relative">
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email', $settings->email) }}"
                                           class="form-input pl-11"
                                           placeholder="info@example.com">

                                    <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-width="2"
                                              d="M3 8l9 6 9-6"/>
                                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    </svg>
                                </div>
                            </div>


                            {{-- Phone --}}
                            <div>
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $settings->phone) }}"
                                       class="form-input"
                                       placeholder="+880 1XXX-XXXXXX">
                            </div>


                            {{-- Alternate Phone --}}
                            <div>
                                <label class="form-label">
                                    Alternate Phone
                                </label>

                                <input type="text"
                                       name="alternate_phone"
                                       value="{{ old('alternate_phone', $settings->alternate_phone) }}"
                                       class="form-input"
                                       placeholder="+880 1XXX-XXXXXX">
                            </div>


                            {{-- Address --}}
                            <div class="md:col-span-2">

                                <label class="form-label">
                                    School Address
                                </label>

                                <textarea name="address"
                                          rows="3"
                                          class="form-input resize-none"
                                          placeholder="Enter complete school address">{{ old('address', $settings->address) }}</textarea>

                            </div>

                        </div>

                    </div>
                </section>



                {{-- Social --}}
                <section id="social"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-pink-50/70 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-pink-100 flex items-center justify-center">

                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M7 8h10M7 12h5"/>
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                                </svg>

                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Social & Website Links
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Add your official social media and website links.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="form-label">
                                    Facebook URL
                                </label>

                                <input type="url"
                                       name="facebook_url"
                                       value="{{ old('facebook_url', $settings->facebook_url) }}"
                                       class="form-input"
                                       placeholder="https://facebook.com/your-school">
                            </div>


                            <div>
                                <label class="form-label">
                                    YouTube URL
                                </label>

                                <input type="url"
                                       name="youtube_url"
                                       value="{{ old('youtube_url', $settings->youtube_url) }}"
                                       class="form-input"
                                       placeholder="https://youtube.com/@your-school">
                            </div>


                            <div>
                                <label class="form-label">
                                    LinkedIn URL
                                </label>

                                <input type="url"
                                       name="linkedin_url"
                                       value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                                       class="form-input"
                                       placeholder="https://linkedin.com/company/...">
                            </div>


                            <div>
                                <label class="form-label">
                                    School Website URL
                                </label>

                                <input type="url"
                                       name="website_url"
                                       value="{{ old('website_url', $settings->website_url) }}"
                                       class="form-input"
                                       placeholder="https://example.com">
                            </div>

                        </div>

                    </div>
                </section>



                {{-- Footer --}}
                <section id="footer"
                         class="settings-section bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-100/70 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-11 h-11 rounded-xl bg-gray-200 flex items-center justify-center">

                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>

                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Footer
                                </h2>

                                <p class="text-sm text-gray-500">
                                    Customize the description shown in your website footer.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        <label class="form-label">
                            Footer Description
                        </label>

                        <textarea name="footer_text"
                                  rows="5"
                                  maxlength="1000"
                                  class="form-input resize-none"
                                  placeholder="Short description shown in the website footer...">{{ old('footer_text', $settings->footer_text) }}</textarea>

                        <p class="form-help">
                            Keep this short and informative.
                        </p>

                    </div>

                </section>



                {{-- Bottom Actions --}}
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-full bg-green-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                Ready to save?
                            </p>

                            <p class="text-xs text-gray-500">
                                Your changes will be applied to the website.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3 w-full sm:w-auto">

                        <a href="{{ route('home') }}"
                           target="_blank"
                           class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-width="2"
                                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>

                            Preview
                        </a>


                        <button type="submit"
                                id="saveButton"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl bg-primary text-white font-semibold shadow-sm hover:opacity-90 active:scale-[0.98] transition">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                            Save Settings
                        </button>

                    </div>

                </div>

            </div>
        </div>

    </form>

</div>



{{-- Custom CSS --}}
<style>
    .form-label {
        display: block;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 600;
        color: rgb(55 65 81);
        margin-bottom: 0.5rem;
    }

    .form-input {
        display: block;
        width: 100%;
        border-radius: 0.75rem;
        border: 1px solid rgb(209 213 219);
        background-color: white;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        color: rgb(31 41 55);
        outline: none;
        transition: all 0.2s ease;
    }

    .form-input::placeholder {
        color: rgb(156 163 175);
    }

    .form-input:focus {
        border-color: rgb(99 102 241);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.10);
    }

    .form-help {
        margin-top: 0.4rem;
        font-size: 0.75rem;
        line-height: 1rem;
        color: rgb(156 163 175);
    }

    .form-error {
        margin-top: 0.4rem;
        font-size: 0.75rem;
        color: rgb(220 38 38);
    }

    .input-icon {
        position: absolute;
        left: 0.9rem;
        top: 50%;
        transform: translateY(-50%);
        width: 1.25rem;
        height: 1.25rem;
        color: rgb(156 163 175);
        pointer-events: none;
    }

    .upload-card {
        border: 1px solid rgb(229 231 235);
        border-radius: 1rem;
        padding: 1rem;
        background: rgb(249 250 251);
    }

    .preview-area {
        min-height: 170px;
        border: 2px dashed rgb(229 231 235);
        border-radius: 0.75rem;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        overflow: hidden;
    }

    .upload-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.7rem 1rem;
        border-radius: 0.75rem;
        background: white;
        border: 1px solid rgb(209 213 219);
        color: rgb(55 65 81);
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .upload-button:hover {
        background: rgb(249 250 251);
        border-color: rgb(156 163 175);
    }

    .settings-nav.active {
        background: rgba(99, 102, 241, 0.08);
        color: rgb(79 70 229);
    }

    .settings-nav.active span:first-child {
        background: rgba(99, 102, 241, 0.12);
    }

    html {
        scroll-behavior: smooth;
    }

    .settings-section {
        scroll-margin-top: 100px;
    }
</style>



{{-- JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Image Preview
    |--------------------------------------------------------------------------
    */

    function previewImage(input, previewId, type) {

        const file = input.files[0];

        if (!file) return;

        const preview = document.getElementById(previewId);

        const reader = new FileReader();

        reader.onload = function (e) {

            if (type === 'logo') {

                preview.innerHTML = `
                    <img src="${e.target.result}"
                         alt="Logo Preview"
                         class="max-h-28 max-w-[250px] object-contain">
                `;

            } else {

                preview.innerHTML = `
                    <img src="${e.target.result}"
                         alt="Favicon Preview"
                         class="w-20 h-20 object-contain">
                `;

            }
        };

        reader.readAsDataURL(file);
    }


    const logoInput = document.getElementById('logoInput');

    if (logoInput) {
        logoInput.addEventListener('change', function () {
            previewImage(this, 'logoPreview', 'logo');
        });
    }


    const faviconInput = document.getElementById('faviconInput');

    if (faviconInput) {
        faviconInput.addEventListener('change', function () {
            previewImage(this, 'faviconPreview', 'favicon');
        });
    }



    /*
    |--------------------------------------------------------------------------
    | Meta Description Counter
    |--------------------------------------------------------------------------
    */

    const description = document.getElementById('siteDescription');
    const counter = document.getElementById('descriptionCounter');

    function updateCounter() {

        if (!description || !counter) return;

        counter.textContent =
            `${description.value.length} / 1000`;

    }

    if (description) {

        updateCounter();

        description.addEventListener('input', updateCounter);

    }



    /*
    |--------------------------------------------------------------------------
    | Smooth Sidebar Navigation
    |--------------------------------------------------------------------------
    */

    const navLinks = document.querySelectorAll('.settings-nav');

    navLinks.forEach(link => {

        link.addEventListener('click', function () {

            navLinks.forEach(item => {
                item.classList.remove('active');
            });

            this.classList.add('active');

        });

    });



    /*
    |--------------------------------------------------------------------------
    | Active Section While Scrolling
    |--------------------------------------------------------------------------
    */

    const sections = document.querySelectorAll('.settings-section');

    const observer = new IntersectionObserver(
        (entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    navLinks.forEach(link => {
                        link.classList.remove('active');
                    });

                    const activeLink = document.querySelector(
                        `.settings-nav[href="#${entry.target.id}"]`
                    );

                    if (activeLink) {
                        activeLink.classList.add('active');
                    }

                }

            });

        },
        {
            rootMargin: '-100px 0px -60% 0px',
            threshold: 0
        }
    );

    sections.forEach(section => observer.observe(section));



    /*
    |--------------------------------------------------------------------------
    | Save Button Loading State
    |--------------------------------------------------------------------------
    */

    const form = document.getElementById('settingsForm');
    const saveButton = document.getElementById('saveButton');

    if (form && saveButton) {

        form.addEventListener('submit', function () {

            saveButton.disabled = true;

            saveButton.innerHTML = `
                <svg class="animate-spin w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24">

                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4">
                    </circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                    </path>

                </svg>

                Saving...
            `;

        });

    }

});
</script>

@endsection