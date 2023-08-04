@extends('templates.layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "All Upcoming Bookings"])

    There are no upcoming bookings in the database.

    <br><br>

    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni harum, recusandae voluptatum corporis aliquam temporibus sapiente dolor illum ipsum, consequuntur quasi vel voluptatibus dicta ex delectus minima debitis, omnis cum!Accusantium animi accusamus eos eius aliquid corporis eum aspernatur obcaecati enim libero hic quo laudantium molestias deleniti beatae laborum iusto dicta ab est, similique voluptatem dolorem? Deleniti iusto modi atque.
@endsection
