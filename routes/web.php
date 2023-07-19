<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SaleInvoice\SaleInvoicePDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('run-artisan', function () {
    Artisan::call('import:stock');
});
Route::get('/phpinfo', function () {
    phpinfo();
});

Route::group(['as' => 'front.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', 'Web\HomeController@index')->name('dashboard');
        Route::get('/new', 'Web\HomeController@indexNew')->name('dashboard_new');
        Route::get('/login', 'Web\HomeController@get_login')->name('get_login');
        Route::post('/login_post', 'Web\HomeController@login_post')->name('login_post');
        Route::get('/signup', 'Web\HomeController@get_signup')->name('get_signup');
        Route::post('/signup', 'Web\HomeController@register')->name('post_signup');
    });

    Route::get('/terms_condition', 'Web\HomeController@terms_condition')->name('terms_condition');
    Route::group(['namespace' => 'Web\WebSite'], function () {
        Route::post('/my-dynamic-modal', 'WebSiteController@getMyDynamicModal')->name('get_dynamic_modal');
        Route::post('/save-dynamic-modal', 'WebSiteController@saveMyDynamicFrom')->name('save_dynamic_form');
    });

    Route::group(['middleware' => 'auth'], function () {
        //Route::get('/user_availability_checker', 'General\GeneralController@user_availability_checker')->name('user_availability_checker');
        Route::group(['namespace' => 'Web\Subscription', 'prefix' => 'subscribe'], function () {
            Route::resource('subscription', 'SubscribePlanController');
            Route::post('/create/payment_intent', 'SubscribePlanController@createPaymentIntent')->name('subscription.create_payment_intent');
            Route::get('/create/subscription_payment', 'SubscribePlanController@subscriptionPayment')->name('subscription.payment');
        });
        Route::group(['namespace' => 'Web\Dashboard', 'prefix' => 'dashboard'], function () {
            Route::get('/dealer-details', 'DashboardController@dealerDetails')->name('dealer_details');
            Route::post('/save-dealer-details', 'DashboardController@saveDealerDetails')->name('save_dealer_details');
        });
        Route::group(['middleware' => 'is_subscription_available_or_not'], function () {
            Route::group(['namespace' => 'Web\Dashboard', 'prefix' => 'dashboard'], function () {
                Route::get('/', 'DashboardController@index')->name('home');
                // Route::get('/plans', 'PageController@plans')->name('plans');
                Route::get('/reminder-close', 'DashboardController@reminderClose')->name('reminder.close');
                Route::get('/my-profile', 'DashboardController@myProfile')->name('my_profile');
                Route::get('/edit-profile', 'DashboardController@editProfile')->name('edit_profile');

                Route::post('/save-profile', 'DashboardController@saveProfile')->name('save_profile');

                Route::get('/settings', 'DashboardController@settings')->name('settings');
                Route::post('/change-password', 'DashboardController@changePassword')->name('change_password');
                Route::post('/notification-change', 'DashboardController@notificationChange')->name('notification_change');
                Route::post('/update-password', 'PageController@update_password')->name('update_password');

                Route::get('/email', 'PageController@email')->name('email');
                Route::post('/sales-record', 'PageController@salesRecord')->name('sales_record');

                Route::get('/my-expense/listing', 'ExpenseController@listing')->name('expense.listing');
                Route::get('/my-expense', 'ExpenseController@index')->name('expense.index');
                Route::post('/create/expense', 'ExpenseController@create')->name('expense.create');
                Route::get('/expense/edit_form', 'ExpenseController@get_edit_form')->name('expense.get_edit_form');
                Route::get('/expense/delete_stock', 'ExpenseController@delete_stock')->name('expense.delete_stock');
                Route::post('/expense/get_comparision_data', 'ExpenseController@get_comparision_data')->name('expense.get_comparision_data');
                Route::post('/expense/export', 'ExpenseController@export')->name('expense.export');
            });

            Route::group(['namespace' => 'Web\WebSite', 'prefix' => 'dashboard'], function () {
                Route::get('/my-website', 'WebSiteController@myWebsite')->name('my_website');
                Route::get('/edit-website', 'WebSiteController@editWebsite')->name('edit_website');
                Route::post('/my-web-content', 'WebSiteController@postWebContent')->name('post_web_content');
                // Route::post('/my-dynamic-modal', 'WebSiteController@getMyDynamicModal')->name('get_dynamic_modal');
                Route::post('/my-timing-modal', 'WebSiteController@getMyTimingModal')->name('get_timing_modal');
                // Route::post('/save-dynamic-modal', 'WebSiteController@saveMyDynamicFrom')->name('save_dynamic_form');
                Route::post('/delete-items', 'WebSiteController@removeItems')->name('remove_items');
                Route::post('/get-service-html', 'WebSiteController@getServiceHTML')->name('get_services_html');
                Route::post('/get-testimonial-html', 'WebSiteController@getTestimonialHTML')->name('get_testimonial_html');
                Route::post('/get-stock-html', 'WebSiteController@getStockHTML')->name('get_stock_html');
                Route::post('/get-timings-html', 'WebSiteController@getTimingsHTML')->name('get_timings_html');
                Route::group(['namespace' => 'Content', 'prefix' => 'website'], function () {
                    Route::get('/setting', 'SettingController@get_setting')->name('website.setting');
                    Route::post('/save-setting', 'SettingController@post_setting')->name('website.post_setting');
                    Route::get('/opening-hours', 'OpeningHourController@get_openingHour')->name('website.openingHour');
                    Route::post('/opening-hours', 'OpeningHourController@post_openingHour')->name('website.post_openingHour');

                    Route::get('/recent-stock', 'RecentStockController@get_recentStock')->name('website.recent_stock');
                    Route::get('/recent-stock/listing', 'RecentStockController@listing')->name('website.recent_stock.listing');
                    Route::get('/recent-stock/edit_form', 'RecentStockController@get_edit_form')->name('website.recent_stock.get_edit_form');
                    Route::post('/recent-stock/create', 'RecentStockController@create')->name('website.recent_stock.create');
                    Route::get('/recent-stock/delete', 'RecentStockController@delete')->name('website.recent_stock.delete');

                    Route::get('/testimonials', 'TestimonialsController@get_testimonials')->name('website.testimonials');
                    Route::get('/testimonials/listing', 'TestimonialsController@listing')->name('website.testimonials.listing');
                    Route::get('/testimonials/edit_form', 'TestimonialsController@get_edit_form')->name('website.testimonials.get_edit_form');
                    Route::post('/testimonials/create', 'TestimonialsController@create')->name('website.testimonials.create');
                    Route::get('/testimonials/delete', 'TestimonialsController@delete')->name('website.testimonials.delete');

                    Route::get('/services', 'ServicesController@get_services')->name('website.services');
                    Route::get('/services/listing', 'ServicesController@listing')->name('website.services.listing');
                    Route::get('/services/edit_form', 'ServicesController@get_edit_form')->name('website.services.get_edit_form');
                    Route::post('/services/create', 'ServicesController@create')->name('website.services.create');
                    Route::get('/services/delete', 'ServicesController@delete')->name('website.services.delete');

                    Route::get('/home', 'HomeController@get_home')->name('website.home');
                    Route::post('/home/content', 'HomeController@post_home_content')->name('website.home.post_content');
                });
            });

            Route::group(['namespace' => 'Web\SaleInvoice', 'prefix' => 'dashboard'], function () {
                Route::post('generate-sales-invoice', [SaleInvoicePDFController::class, 'generatePDFPreview'])->name('generate_sales_invoice_pdf');
                Route::get('generate-sales-invoice-test', [SaleInvoicePDFController::class, 'generatePDFPreview']);
                Route::get('/sales-invoice', 'SaleInvoiceController@salesInvoice')->name('sales_invoice');
                Route::post('/create/sales-invoice', 'SaleInvoiceController@saveSalesInvoice')->name('save_sale_invoice');
            });
            Route::group(['namespace' => 'Web\VehicleStock', 'prefix' => 'dashboard'], function () {
                Route::get('/stock-list/listing', 'VehicleStockController@listing')->name('vehicle_stock.listing');
                Route::resource('stock-list', 'VehicleStockController');
                Route::post('/create/stock', 'VehicleStockController@create')->name('vehicle_stock.create');
                Route::post('/vehicle_stock/save_additional_stock_price', 'VehicleStockController@save_additional_stock_price')->name('vehicle_stock.save_additional_stock_price');
                Route::get('/vehicle_stock/edit_form', 'VehicleStockController@get_edit_form')->name('vehicle_stock.get_edit_form');
                Route::get('/vehicle_stock/view_form', 'VehicleStockController@get_view_form')->name('vehicle_stock.get_view_form');
                Route::get('/vehicle_stock/add_additional_stock_price_form', 'VehicleStockController@get_additional_price_form')->name('vehicle_stock.get_additional_price_form');
                Route::get('/vehicle_stock/delete_stock', 'VehicleStockController@delete_stock')->name('vehicle_stock.delete_stock');
                Route::get('/vehicle_stock/delete_additional_price', 'VehicleStockController@delete_additional_price')->name('vehicle_stock.delete_additional_price');
            });
            Route::group(['namespace' => 'Web\SalesRecord', 'prefix' => 'sales_record'], function () {
                Route::get('/sales-record/listing', 'SalesRecordController@listing')->name('sales_record.listing');
                Route::resource('sales-record', 'SalesRecordController');
                Route::post('/create/stock', 'SalesRecordController@update_sales')->name('sales_record.update_sales');
                Route::get('/sales_record/edit_form', 'SalesRecordController@get_edit_form')->name('sales_record.get_edit_form');
                Route::get('/sales_record/view_form', 'SalesRecordController@get_view_form')->name('sales_record.get_view_form');
                Route::get('/sales_record/delete_sales_record', 'SalesRecordController@delete_sales_record')->name('sales_record.delete_sale_record');
                Route::post('/sales_record/get_comparision_data', 'SalesRecordController@get_comparision_data')->name('sales_record.get_comparision_data');
            });
            Route::group(['namespace' => 'Web\CustomerDataBase', 'prefix' => 'customer_data_base'], function () {
                Route::get('/customer-data-base/listing', 'CustomerDataBaseController@listing')->name('customer_data_base.listing');
                Route::get('/customer-data-base/export', 'CustomerDataBaseController@export')->name('customer-data-base.export');
                Route::resource('customer-data-base', 'CustomerDataBaseController');
            });
            Route::group(['namespace' => 'Web\ComplaintManagement', 'prefix' => 'complaint_management'], function () {
                Route::get('/complaint-management/listing', 'ComplaintManagementController@listing')->name('complaint_management.listing');
                Route::resource('complaint_management', 'ComplaintManagementController');
                Route::post('/create/complaint', 'ComplaintManagementController@create')->name('complaint_management.create');
                //Route::post('/create/stock', 'ComplaintManagementController@create')->name('complaint_management.update_sales');
                Route::get('/complaint-management/edit_form', 'ComplaintManagementController@get_edit_form')->name('complaint_management.get_edit_form');
                Route::get('/complaint-management/view_form', 'ComplaintManagementController@get_view_form')->name('complaint_management.get_view_form');
                Route::get('/complaint-management/view/{id}', 'ComplaintManagementController@get_view')->name('complaint_management.get_view');
                Route::get('/complaint-management/delete_complaint_management', 'ComplaintManagementController@delete_complaint_management')->name('complaint_management.delete');
                Route::get('/complaint-management/get_mark_as_complaint_form', 'ComplaintManagementController@get_mark_as_complaint_form')->name('complaint_management.get_mark_as_complaint_form');
                Route::get('/complaint-management/get_add_notes_form', 'ComplaintManagementController@get_add_notes_form')->name('complaint_management.get_add_notes_form');
                Route::post('/complaint-management/save_additional_note', 'ComplaintManagementController@save_additional_note')->name('complaint_management.save_additional_note');
            });
            Route::group(['namespace' => 'Web\ToDO', 'prefix' => 'to-do'], function () {
                Route::get('/index', 'ToDOController@index')->name('to_do.index');
                Route::get('/edit_form', 'ToDOController@get_edit_form')->name('to_do.get_edit_form');
                Route::post('/create/to-do', 'ToDOController@create')->name('to_do.create');
                Route::get('/delete_to_do', 'ToDOController@delete_to_do')->name('to_do.delete');
                Route::get('/mark_as_complete', 'ToDOController@mark_as_complete')->name('to_do.mark_as_complete');
                Route::get('/list', 'ToDOController@get_list')->name('to_do.list');
            });

            Route::group(['namespace' => 'Web\Event', 'prefix' => 'event'], function () {
                Route::get('/index', 'EventController@index')->name('event.index');
                Route::get('/edit_form', 'EventController@get_edit_form')->name('event.get_edit_form');
                Route::post('/create', 'EventController@create')->name('event.create');
                Route::get('/get_day_event', 'EventController@get_day_event')->name('event.get_day_event');
                Route::get('/delete_event', 'EventController@delete_event')->name('event.delete');
            });
            Route::group(['namespace' => 'Web\Finance', 'prefix' => 'finance'], function () {
                Route::get('listing', 'FinanceController@listing')->name('finance.listing');
                Route::resource('finance', 'FinanceController');
                //Route::get('/view/{id}', 'FinanceController@view')->name('finance.get_contacted_broker_form');
                Route::get('/get_contacted_broker_form', 'FinanceController@get_contacted_broker_form')->name('finance.get_contacted_broker_form');
                Route::get('/get_completed_form', 'FinanceController@get_completed_form')->name('finance.get_completed_form');
            });
            Route::group(['namespace' => 'Web\Chat', 'prefix' => 'chat'], function () {
                Route::resource('chat', 'ChatController');
            });
        });
        Route::get('/logout', 'General\GeneralController@logout')->name('logout');
    });

    Route::group(['namespace' => 'Web\Template', 'prefix' => 'mongo', 'middleware' => 'guest_register'], function () {
        Route::get('/{slug}', 'TemplateController@home')->name('template.home');
        Route::get('/{slug}/stock-list', 'TemplateController@stock_list')->name('template.stock_list');
        Route::get('/{slug}/stock-details/{id}', 'TemplateController@stock_details')->name('template.stock_details');
        Route::get('/{slug}/stock-details/{id}/print-summary', 'TemplateController@print_summary')->name('template.stock_details.print_summary');
        Route::post('/{slug}/stock-details/{id}/enquiry', 'TemplateController@enquiry')->name('template.stock_details.enquiry');
        Route::get('/{slug}/finance', 'TemplateController@finance')->name('template.finance');
        Route::post('/finance/application', 'TemplateController@financeApplication')->name('template.finance.application');
        Route::get('/{slug}/contact-us', 'TemplateController@contact_us')->name('template.contact_us');
        Route::post('/contact-us/post', 'TemplateController@contact_us_post')->name('template.contact_us.post');
        Route::post('/get_model', 'TemplateController@get_model')->name('template.get_model');
    });

    Route::get('availability_checker', 'General\GeneralController@availability_checker')->name('availability_checker');
    Route::get('forgot_password/{token}', 'General\GeneralController@forgot_password_view')->name('forgot_password_view');
    Route::get('activate_account/{token}', 'General\GeneralController@activateAccount')->name('activate_account');
    Route::post('forgot_password', 'General\GeneralController@forgot_password_post')->name('forgot_password_post');
});
