import { initEditor } from "./editor";
import { createPost } from "./create-post";
import { likes } from "./likes.js";
import { loadPostsOnScroll } from "./load-posts-on-scroll";

export default function posts() {
  initEditor();
  createPost();
  likes();
  loadPostsOnScroll();
}
