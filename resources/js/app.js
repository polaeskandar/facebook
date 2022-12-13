import './bootstrap';

import { errorsContainer } from "./Errors/errors-container";
import { indexPageProfileImageUploader } from "./Profile/index-page-profile-image-uploader";
import { emailVerificationNotice } from "./EmailVerification/email-verification-notice";
import posts from "./Posts/posts";

errorsContainer();
indexPageProfileImageUploader();
emailVerificationNotice();
posts();
