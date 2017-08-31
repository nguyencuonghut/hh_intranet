<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Post;
use App\Picture;
use App\Video;

class PageController extends Controller
{
    public function getHome() {
        $jumbotrons = Post::orderBy('id', 'desc')->where('category_id', '1')->orWhere('category_id', '2')->orWhere('category_id', '3')->orWhere('category_id', '4')->paginate(4);
        $posts = Post::orderBy('id', 'desc')->where('category_id', '1')->paginate(4);
        $announcements  = Post::orderBy('id', 'desc')->where('category_id', '2')->paginate(4);
        $events = Post::orderBy('id', 'desc')->where('category_id', '3')->paginate(4);
        $employees = Post::orderBy('id', 'desc')->where('category_id', '4')->paginate(4);
        $relaxs = Post::orderBy('id', 'desc')->where('category_id', '6')->paginate(10);
        $pictures = Picture::orderBy('id', 'desc')->where('type_id', '1')->paginate(10);
        $banners = Picture::orderBy('id', 'desc')->where('type_id', '2')->paginate(10);
        $video = Video::orderBy('id', 'desc')->first();
        return view('pages.home')->withJumbotrons($jumbotrons)->withPosts($posts)->withEvents($events)->withAnnouncements($announcements)->withEmployees($employees)->withRelaxs($relaxs)->withPictures($pictures)->withBanners($banners)->withVideo($video);
    }

    // News
    public function getNewsIndex() {
        $banners = Picture::orderBy('id', 'des')->where('type_id', '2')->paginate(10);
        $posts = Post::orderBy('id', 'desc')->where('category_id', '1')->paginate(5);

        return view('pages.news.index')->withPosts($posts)->withBanners($banners);
    }
    public function getNewsSingle($id) {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $post->category_id)->paginate(6);

        return view('pages.news.show')->with(['posts' => $posts, 'post' => $post]);
    }

    // Events
    public function getEventIndex() {
        $posts = Post::orderBy('id', 'desc')->where('category_id', '3')->paginate(5);
        $banners = Picture::orderBy('id', 'des')->where('type_id', '2')->paginate(10);

        return view('pages.events.index')->withPosts($posts)->withBanners($banners);
    }
    public function getEventSingle($id) {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $post->category_id)->paginate(6);

        return view('pages.events.show')->with(['posts' => $posts, 'post' => $post]);
    }

    // Announcements
    public function getAnnouncementIndex() {
        $posts = Post::orderBy('id', 'desc')->where('category_id', '2')->paginate(5);
        $banners = Picture::orderBy('id', 'desc')->where('type_id', '2')->paginate(10);

        return view('pages.announcements.index')->withPosts($posts)->withBanners($banners);
    }
    public function getAnnouncementSingle($id) {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $post->category_id)->paginate(6);

        return view('pages.announcements.show')->with(['posts' => $posts, 'post' => $post]);
    }

    // Employees
    public function getEmployeeIndex() {
        $posts = Post::orderBy('id', 'desc')->where('category_id', '4')->paginate(5);
        $banners = Picture::orderBy('id', 'desc')->where('type_id', '2')->paginate(10);

        return view('pages.employees.index')->withPosts($posts)->withBanners($banners);
    }
    public function getEmployeeSingle($id) {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $post->category_id)->paginate(6);

        return view('pages.employees.show')->with(['posts' => $posts, 'post' => $post]);
    }

    // Forms
    public function getFormIndex() {
        $posts = Post::orderBy('id', 'desc')->where('category_id', '5')->paginate(5);
        $banners = Picture::orderBy('id', 'desc')->where('type_id', '2')->paginate(10);

        return view('pages.forms.index')->withPosts($posts)->withBanners($banners);
    }
    public function getFormSingle($id) {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $post->category_id)->paginate(6);

        return view('pages.forms.show')->with(['posts' => $posts, 'post' => $post]);
    }

    // View file
    public function getFile($filename) {
        $path = public_path('upload/files/' . $filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    // Relax
    public function getRelaxIndex() {
        $relaxs = Post::orderBy('id', 'desc')->where('category_id', '6')->paginate(5);
        $banners = Picture::orderBy('id', 'desc')->where('type_id', '2')->paginate(10);

        return view('pages.relaxs.index')->withRelaxs($relaxs)->withBanners($banners);
    }
    public function getRelaxSingle($id) {
        $relax = Post::find($id);
        $relaxs = Post::orderBy('id', 'desc')->where('category_id', $relax->category_id)->paginate(6);

        return view('pages.relaxs.show')->with(['relaxs' => $relaxs, 'relax' => $relax]);
    }


    public function getOrganization() {
        return view('pages.organization');
    }

    public function getOrganizationHCNS() {
        return view('pages.org_hcns');

    }

    public function getOrganizationKetoan() {
        return view('pages.org_ketoan');

    }

    public function getOrganizationKSNB() {
        return view('pages.org_ksnb');

    }

    public function getOrganizationKinhdoanh() {
        return view('pages.org_kinhdoanh');

    }

    public function getOrganizationSanxuat() {
        return view('pages.org_sanxuat');

    }

    public function getOrganizationBaotri() {
        return view('pages.org_baotri');

    }

    public function getOrganizationThumua() {
        return view('pages.org_thumua');

    }

    public function getOrganizationQLCL() {
        return view('pages.org_qlcl');

    }

    public function getOrganizationKythuat() {
        return view('pages.org_kythuat');

    }

    // Contact
    public function getContact() {
        $employees = Employee::orderBy('id', 'desc')->where('department_id', '1')->paginate(100);
        return view('pages.contact')->withEmployees($employees);
    }
    public function getContactKeToan() {
        return view('pages.contact_ketoan');
    }
    public function getContactKSNB() {
        return view('pages.contact_ksnb');
    }
    public function getContactKinhdoanh() {
        return view('pages.contact_kinhdoanh');
    }
    public function getContactSanxuat() {
        return view('pages.contact_sanxuat');
    }
    public function getContactBaotri() {
        return view('pages.contact_baotri');
    }
    public function getContactThumua() {
        return view('pages.contact_thumua');
    }
    public function getContactQLCL() {
        return view('pages.contact_qlcl');
    }
    public function getContactKythuat() {
        return view('pages.contact_kythuat');
    }

    public function getTool() {
        return view('pages.tool');

    }
}
