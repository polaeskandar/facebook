import './bootstrap';


// Errors
import './Errors/errors-container';

// User Profile
import './Profile/index-page-image-uploader';

// Posts
import './Posts/posts';
import './Posts/load-posts-on-scroll';
import posts from "./Posts/posts";
import { configureLikes } from "./Posts/likes";

posts();
configureLikes();
