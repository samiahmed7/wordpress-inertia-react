import { Head, Link, useForm } from "@inertiajs/react";

export default function FrontPage({page}) {
  console.log(page)
  return (
    
    <>
    <div dangerouslySetInnerHTML={{__html: page.post_content}}>
    
    </div>
    <Link href="/wordpress/movies">Register</Link>
    </>
  );
}