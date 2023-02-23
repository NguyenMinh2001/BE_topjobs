// validate a email with javascript

function Modal(props) {
  if(props.user.business__info == ""){
    return (<></>)
  }else{
  return (
    <div class="modal" style={{zIndex :'9999'}} id={"myModal"+props.user.id}>
    <div class="modal-dialog">
      <div class="modal-content">
      

        <div class="modal-header">
          <h4 class="modal-title">Thông tin xác thực</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
        <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top"/>
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src={"api/image/"+props.user.avatar} class="rounded-circle img-fluid border border-2 border-white"/>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="text-center mt-4">
                <h5>
                  {props.user.name}
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{props.user.business__info[0].phone}
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{props.user.business__info[0].address}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Giấy phép kinh doanh:
                  <img width="400" src={"/api/image/"+props.user.business__info[0].license}/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  ); }
}

function Listpage({ num_page, focus, setFocus }) {
  if (focus === num_page) {
    return (
      <li type="button" class="page-item "><p class='page-link isfocus'>{num_page}</p></li>
    )
  }
  return (
    <li type="button" onClick={() => (setFocus(num_page))} class="page-item "><p class='page-link'>{num_page}</p></li>
  )
}

function Table() {
  const [user_business, setUserBusiness] = React.useState([]);
  const [users, SetUser] = React.useState([]);
  const [search, setSearch] = React.useState('')
  const [userinpage, setUserinpage] = React.useState([])
  const [num_pages, setPagenum] = React.useState([]);
  const [focus, setFocus] = React.useState(1);
  const listpage = num_pages.map((num_page) => <Listpage num_page={num_page} focus={focus} setFocus={setFocus} />);
  // fomatDatetime('2023-02-05T11:39:16.000000Z')
  React.useEffect(() => {
    axios.get('/api/user_bussiness')
      .then(response => {
        // console.log(response)
        const user_business = response.data;
        user_business.sort(function (a, b) {
          return b.id - a.id
        })
        SetUser(user_business)
        setUserBusiness(user_business)
      }).catch(e => {
        console.log(e)
      })
  }, [])

  React.useEffect(() => {
    const NumOfPage = []
    const users_page = [];
    if (user_business != '') {
      for (let i = 1; i < user_business.length / 10 + 1; i++) {
        NumOfPage.push(i);
      }

      if (focus * 10 < user_business.length) {
        for (let i = 10 * (focus - 1); i < focus * 10; i++) {
          users_page.push(user_business[i])
        }
      } else {
        for (let i = 10 * (focus - 1); i < user_business.length; i++) {
          users_page.push(user_business[i])
        }
      }

    } else {
      NumOfPage.push(1)
    }
    setUserinpage(users_page);
    setPagenum(NumOfPage);
  }, [focus, user_business]);

  return (
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <h6 class="col">Danh sách doanh nghiệp</h6>
          <div class=" col-4 ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input value={search} onChange={(e) => {

                setSearch(e.target.value)
                setFocus(1);
                const temp = [];
                if (e.target.value == '') {
                  for (let index = 0; index < users.length; index++) {
                    temp.push(users[index])
                  }
                } else {
                  for (let i = 0; i < users.length; i++) {
                    // console.log(users[i].name.indexOf(e.target.value)>=0 || users[i].email.indexOf(e.target.value)>=0);
                    if (users[i].name.indexOf(e.target.value) >= 0 || users[i].email.indexOf(e.target.value) >= 0) {
                      temp.push(users[i])
                    }
                  }
                }
                // console.log(temp)
                setUserBusiness(temp)
              }} type="text" class="form-control" placeholder="Type here..." />
            </div>
          </div>
        </div>
      </div>

      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">

          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thông tin</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đơn xác thực</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tạo trên hệ thống</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              {userinpage.map((userinpage) =>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img class="avatar avatar-sm me-3" src={"api/image/" + userinpage.avatar} alt="user" />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{userinpage.name}</h6>
                        <p class="text-xs text-secondary mb-0">{userinpage.email}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    {userinpage.business__info == '' ?
                      (<><p class="text-xs font-weight-bold mb-0">Chưa gữi đơn</p></>
                      ) : (
                        <><p class="text-xs font-weight-bold mb-0">Đã gửi đơn</p><p type="button" class="text-xs text-secondary mb-0" data-toggle="modal" data-target={"#myModal" + userinpage.id}>chi tiết</p></>)
                    }
                  </td>
                  <td class="align-middle text-center text-sm">
                    {userinpage.business_auth ? (
                      <span class="badge badge-sm bg-gradient-success">Đã xác thực</span>
                    ) : (
                      <span class="badge badge-sm bg-gradient-secondary">Chưa xác thực</span>
                    )}

                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{new Date(userinpage.created_at).toString()}</span>
                  </td>
                  <td class="align-middle">
                    {(!userinpage.business_auth && userinpage.business__info != '') ?
                      (<a href={"/verifyBusiness/" + userinpage.id} type="button" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> phê duyệt</a>) :
                      ((userinpage.business_auth) ?
                        (<a type="button" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> Gỡ</a>) : (<a type="button" class="text-secondary font-weight-bold text-xs disabled-link" data-toggle="tooltip" data-original-title="Edit user"> phê duyệt
                        </a>))
                    }
                  </td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer footer-table">
        <ul class="pagination">
          <li
            onClick={() => {
              if (focus > 1) {
                setFocus(focus - 1)
              }
            }}
            type="button" class="page-item"><p class="page-link">Pre</p></li>
          {listpage}
          <li
            onClick={() => {
              if (focus < num_pages.length) {
                setFocus(focus + 1)
              }
            }}
            type="button" class="page-item"><p class="page-link">Next</p></li>
        </ul>
      </div>
      {userinpage.map((userinpage) => <Modal user = {userinpage}/>)}
    </div>
  );
}

ReactDOM.render(<Table />, document.getElementById("talbe-user"))